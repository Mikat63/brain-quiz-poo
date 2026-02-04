<?php
session_start();
require_once __DIR__ . '/../utils/is_connected.php';

// control if exist and int format
if (!isset($_GET['id'])) {
    header("location: ../public/choice_quiz.php?error=missing_variable");
    exit;
}

if (!filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    header("location: ../public/choice_quiz.php?error=variable_format");
    exit;
}

if (empty(trim($_GET['id']))) {
    header("location: ../public/choice_quiz.php?error=variable_format");
    exit;
}


$themeId = (int)$_GET['id'];

// db connect
try {
    require_once __DIR__ . '/db_connect.php';

    // theme request
    $request = $db->prepare(
        'SELECT * FROM themes WHERE id = :themeId'
    );
    $request->execute([
        'themeId' => $themeId
    ]);

    $theme = $request->fetch();

    if (!$theme) {
        header("location: ../public/choice_quiz.php?error=unknown_theme");
        exit;
    }

    $_SESSION['theme'] = $theme;


    // question and answers reqyest and put in session
    // questions
    $request = $db->prepare(
        'SELECT 
                          *
                         FROM
                            questions 
                        WHERE id_theme = :theme_quiz'
    );

    $request->execute([
        'theme_quiz' => $_SESSION['theme']['id']
    ]);

    $_SESSION['questions'] = $request->fetchAll(PDO::FETCH_ASSOC);

    // answers
    $request = $db->prepare(
        'SELECT
                                * 
                            FROM 
                                answers 
                            WHERE
                                id_question = :question_id'
    );


    foreach ($_SESSION['questions'] as $key => $question) {
        $request->execute([
            'question_id' => $question['id']
        ]);

        $answersByQuestion = $request->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['questions'][$key]['answers'] = $answersByQuestion;
    };

    $_SESSION['question_number'] = 0;


    $_SESSION['score'] = 0;

    header("Location: ../public/quiz_page.php");
    exit;
} catch (PDOException $error) {
    header("location: ../public/choice_quiz.php?error=" . urlencode($error->getMessage()));
    exit;
}

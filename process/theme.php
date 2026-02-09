<?php
require_once '../utils/autoloader.php';
session_start();
require_once '../utils/is_connected.php';


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
    require_once '../utils/db_connect.php';
    $themeRepository =  new ThemeRepository ($db, new ThemeMapper);

    $theme = $themeRepository->findOneById($themeId);

    if (!$theme) {
        header("location: ../public/choice_quiz.php?error=unknown_theme");
        exit;
    }


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
        'theme_quiz' => $theme->getId()
    ]);

    $questionsDatas = $request->fetchAll(PDO::FETCH_ASSOC);


    $questionObjects = [];

    foreach ($questionsDatas as $questionData) {
        $questionObjects[] = new Question(question: $questionData['question'], theme: $theme, imgSmallSrc: $questionData['img_path_mobile'], imgLargeSrc: $questionData['img_path_desktop'],  id: $questionData['id']);
    }

    $theme->setQuestions($questionObjects);

    // answers
    $request = $db->prepare(
        'SELECT
                                * 
                            FROM 
                                answers 
                            WHERE
                                id_question = :question_id'
    );


    foreach ($theme->getQuestions() as $key => $question) {
        $request->execute([
            'question_id' => $question->getId()
        ]);

        $answersDatasByQuestion = $request->fetchAll(PDO::FETCH_ASSOC);
        $answers = [];

        foreach ($answersDatasByQuestion as $answerData) {
            $answers[] = new Answer(answer: $answerData['answer'], goodAnswer: $answerData['good_answer'], question: $theme->getQuestions()[$key],  id: $answerData['id']);
        }

        $theme->getQuestions()[$key]->setAnswers($answers);
    };

    $_SESSION['theme'] =  $theme;
    $_SESSION['question_number'] = 0;
    $_SESSION['score'] = 0;
    header("Location: ../public/quiz_page.php");
    exit;
} catch (PDOException $error) {
    header("location: ../public/choice_quiz.php?error=" . urlencode($error->getMessage()));
    exit;
}

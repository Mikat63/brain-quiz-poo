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


try {
    require_once '../utils/db_connect.php';

    // theme object 
    $themeRepository =  new ThemeRepository($db, new ThemeMapper);
    $themeObject = $themeRepository->findOneById($themeId);

    if (!$themeObject) {
        header("location: ../public/choice_quiz.php?error=unknown_theme");
        exit;
    }

    // question and answers reqyest and put in session
    // questions

    $questionRepo = new QuestionRepository($db, new QuestionMapper);
    $questionObjects = $questionRepo->findAllByTheme($themeObject);
    $themeObject->setQuestions($questionObjects);


    // answers

    $answerRepo = new AnswerRepository($db, new AnswerMapper);

    /** @var Question $questionObject */
    foreach ($questionObjects as $questionObject) {
        $answers = $answerRepo->findAllByQuestion($questionObject);
        $questionObject->setAnswers($answers);
    }


    $_SESSION['theme'] =  $themeObject;
    $_SESSION['question_number'] = 0;
    $_SESSION['score'] = 0;
    header("Location: ../public/quiz_page.php");
    exit;
} catch (PDOException $error) {
    header("location: ../public/choice_quiz.php?error=" . urlencode($error->getMessage()));
    exit;
}

<?php
if (
    !isset($_SESSION['theme']) || empty($_SESSION['theme']) ||
    !isset($_SESSION['questions']) || empty($_SESSION['questions']) ||
    !isset($_SESSION['question_number']) || filter_var($_SESSION['question_number'], FILTER_VALIDATE_INT) === false ||
    !isset($_SESSION['score']) || filter_var($_SESSION['score'], FILTER_VALIDATE_INT) === false
) {
    $basePath = (strpos($_SERVER['REQUEST_URI'], '/process/') !== false) ? '../' : './';
    header('Location: ' . $basePath . 'choice_quiz.php');
    exit();
}

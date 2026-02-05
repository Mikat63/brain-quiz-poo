<?php
require_once '../utils/autoloader.php';
session_start();
require_once '../utils/is_quiz_started.php';
require_once '../utils/is_connected.php';

header('Content-Type: application/json; charset=utf-8');

// increment question without score
$_SESSION['question_number']++;

if ($_SESSION['question_number'] >= count($_SESSION['theme']->getQuestions())) {
    echo json_encode(['status' => 'finished']);
    exit();
}

echo json_encode([
    'is_correct' => false,
    'id_answer' => null,
    'clicked_answer' => null,
    'next_question' => $_SESSION['question_number'] + 1 . '/' . count($_SESSION['theme']->getQuestions()),
    'id_question' => $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getId(),
    'question' => $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getQuestion(),
    'img_mobile' => $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getImgSmallSrc(),
    'img_desktop' => $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getImgLargeSrc(),
    'answers' => array_map(function ($answer) {
        return [
            'id' => $answer->getId(),
            'answer' => $answer->getAnswer()
        ];
    }, $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getAnswers())
]);
exit;

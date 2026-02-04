<?php
session_start();
require_once '../utils/is_quiz_started.php';
require_once '../utils/is_connected.php';

header('Content-Type: application/json; charset=utf-8');

// increment question without score
$_SESSION['question_number']++;

if ($_SESSION['question_number'] >= count($_SESSION['questions'])) {
    echo json_encode(['status' => 'finished']);
    exit();
}

echo json_encode([
    'is_correct' => false,
    'id_answer' => null,
    'clicked_answer' => null,
    'next_question' => $_SESSION['question_number'] + 1 . '/' . count($_SESSION['questions']),
    'id_question' => $_SESSION['questions'][$_SESSION['question_number']]['id'],
    'question' => $_SESSION['questions'][$_SESSION['question_number']]['question'],
    'img_mobile' => $_SESSION['questions'][$_SESSION['question_number']]['img_path_mobile'],
    'img_desktop' => $_SESSION['questions'][$_SESSION['question_number']]['img_path_desktop'],
    'answers' => $_SESSION['questions'][$_SESSION['question_number']]['answers']
]);
exit;

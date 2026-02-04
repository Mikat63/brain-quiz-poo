<?php
session_start();
require_once '../utils/is_quiz_started.php';
require_once '../utils/is_connected.php';

// Permettre les requêtes depuis n'importe quelle origine (pour le développement local)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');


// Récupérer les données JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);


// control post values
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo json_encode(['error' => 'bad_method']);
    exit;
}

if (!isset($data['questionId']) || !isset($data['answerId'])) {
    echo json_encode(['error' => 'informations_not_received']);
    exit;
}

if (empty(trim($data['questionId'])) || empty(trim($data['answerId']))) {
    echo json_encode(['error' => 'empty_variable']);
    exit;
}

if (!filter_var($data['questionId'], FILTER_VALIDATE_INT) || !filter_var($data['answerId'], FILTER_VALIDATE_INT)) {
    echo json_encode(['error' => 'Error_format']);
    exit;
}

$dataQuestion = (int)$data['questionId'];
$dataAnswer = (int)$data['answerId'];

// control to verify current_question and his answer
if ((int)$_SESSION['questions'][$_SESSION['question_number']]['id'] !== $dataQuestion) {
    echo json_encode(['error' => 'wrong question']);
    exit;
}

$is_correct = null;
$goodAnswerId = null;

// find the good answer
foreach ($_SESSION['questions'][$_SESSION['question_number']]['answers'] as $answer) {
    if ((int)$answer['good_answer'] === 1) {
        $goodAnswerId = $answer['id'];
    }

    if ((int)$answer['id'] === $dataAnswer) {
        $is_correct = ((int)$answer['good_answer'] === 1);
        if ($is_correct) {
            $_SESSION['score'] += 10;
        }
    }
}



if ($is_correct === null) {
    echo json_encode(['error' => 'not an answer for this question']);
    exit;
}

$_SESSION['question_number']++;

$isFinished = $_SESSION['question_number'] >= count($_SESSION['questions']);

echo json_encode([
    'is_correct' => $is_correct,
    'id_answer' => $goodAnswerId,
    'clicked_answer' => $dataAnswer,
    'status' => $isFinished ? 'finished' : 'next',
    'next_question' => $_SESSION['question_number'] + 1 . '/' . count($_SESSION['questions']),
    'id_question' => $isFinished ? null : $_SESSION['questions'][$_SESSION['question_number']]['id'],
    'question' => $isFinished ? null : $_SESSION['questions'][$_SESSION['question_number']]['question'],
    'img_mobile' => $isFinished ? null : $_SESSION['questions'][$_SESSION['question_number']]['img_path_mobile'],
    'img_desktop' => $isFinished ? null : $_SESSION['questions'][$_SESSION['question_number']]['img_path_desktop'],
    'answers' => $isFinished ? null : $_SESSION['questions'][$_SESSION['question_number']]['answers']
]);
exit;

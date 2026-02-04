<?php
session_start();

// control security input value
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../public/connexion.php?error=bad_method");
    exit;
}

if (!isset($_POST['input_pseudo'])) {
    header("location: ../public/connexion.php?error=missing_pseudo");
    exit;
}

if (empty(trim(($_POST['input_pseudo'])))) {
    header("location: ../public/connexion.php?error=empty_input");
    exit;
}

if (!preg_match('/^[a-z0-9_-]{3,15}$/', $_POST['input_pseudo'])) {
    header("location: ../public/connexion.php?error=format_pseudo");
    exit;
}

if (strlen($_POST['input_pseudo']) < 3 || strlen($_POST['input_pseudo']) > 15) {
    header("location: ../public/connexion.php?error=min_max_input");
    exit;
}

// clean input
$player = strip_tags(htmlspecialchars($_POST['input_pseudo']));

// connexion and query for bdd
require_once __DIR__ . '/db_connect.php';

$request = $db->prepare(
    "SELECT
                            *
                       FROM 
                            users
                       WHERE user = :player"
);

$request->execute([
    ":player" => $player
]);

$user = $request->fetch();

if ($user) {
    $_SESSION['user_id'] = $user['id'];
    header("location: ../public/choice_quiz.php");
    exit;
} else {
    $request = $db->prepare(
        "INSERT INTO users (user)
     VALUES (:input_pseudo)"
    );

    $request->execute([
        ":input_pseudo" => $player
    ]);

    $_SESSION['user_id'] = $db->lastInsertId();

    header("location: ../public/choice_quiz.php");
    exit;
}

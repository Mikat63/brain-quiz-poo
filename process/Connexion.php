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
$player = $_POST['input_pseudo'];
$userObject = new User(username: $player);

// connexion and query for bdd
require_once '../utils/db_connect.php';

$request = $db->prepare(
    "SELECT
                            *
                       FROM 
                            users
                       WHERE user = :player"
);

$request->execute([
    ":player" => $userObject->getUsername()
]);

$user = $request->fetch();

if ($user) {
    $userObject->setId($user['id']);

    $_SESSION['user_id'] = $userObject->getId();

    header("location: ../public/choice_quiz.php");

    exit;
} else {
    $request = $db->prepare(
        "INSERT INTO users (user)
     VALUES (:input_pseudo)"
    );

    $request->execute([
        ":input_pseudo" => $userObject->getUsername()
    ]);

    $userObject->setId(id: $db->lastInsertId());
    $_SESSION['user_id'] = $userObject->getId();

    header("location: ../public/choice_quiz.php");
    exit;
}

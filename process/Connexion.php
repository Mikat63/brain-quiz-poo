<?php
require_once "../utils/autoloader.php";
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



// connexion and query for bdd
require_once '../utils/db_connect.php';
$userRepo = new UserRepository($db, new UserMapper);

$user = $userRepo->findOneByUsername($player);

if ($user) {
    $_SESSION['user'] = $user;

    header("location: ../public/choice_quiz.php");

    exit;
} else {

    $user = $userRepo->insertOne($player);


    $_SESSION['user'] = $user;

    header("location: ../public/choice_quiz.php");
    exit;
}

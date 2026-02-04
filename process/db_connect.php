<?php
try {
    $dsn = "mysql:HOST=localhost;dbname=brain_quiz";
    $user = "root";
    $password = "";

    $db = new PDO($dsn, $user, $password);
} catch (\PDOException $error) {
    header("location: ../public/index.php?error=connexion");
    exit;
}

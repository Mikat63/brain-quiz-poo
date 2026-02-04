<?php
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Déterminer le chemin correct selon le dossier courant
    $basePath = (strpos($_SERVER['REQUEST_URI'], '/process/') !== false) ? '../' : './';
    header('Location: ' . $basePath . 'connexion.php');
    exit();
}

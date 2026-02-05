<?php
require_once "autoloader.php";
if (!isset($_SESSION['user']) || !is_object(($_SESSION['user'])) || empty($_SESSION['user']->getId())) {
    // Déterminer le chemin correct selon le dossier courant
    $basePath = (strpos($_SERVER['REQUEST_URI'], '/process/') !== false) ? '../' : './';
    header('Location: ' . $basePath . './connexion.php');
    exit();
}

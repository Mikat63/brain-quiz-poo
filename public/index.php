<?php
$title = "Accueil";
$buttonLink = "connexion.php";
$ariaDescription = "Commencer le quiz";
$textButton = "Commencer";
require_once "partials/page_infos.php";
?>




<main class="min-h-svh flex flex-col items-center justify-center">
    <!-- main container -->
    <div class="w-[80%] flex-1 flex flex-col items-center justify-between pb-8">
        <?php require_once "partials/logo.php";  ?>
        <?php require_once "partials/start_button.php";  ?>
    </div>
</main>

<?php
require_once "partials/footer.php";
?>
<?php
$title = "Connexion";
$backLink = "index.php";
require_once __DIR__ . '/partials/page_infos.php';
require_once __DIR__ . '/partials/header.php';
?>




<main class="min-h-svh flex flex-col items-center justify-between">
    <!-- main container -->
    <div class="w-[80%] flex flex-col items-center gap-24 justify-between">
        <?php require_once __DIR__ . '/partials/logo.php' ?>
        <!-- connexion with pseudo -->
        <form class="flex flex-col items-center gap-6" action="process/Connexion.php" method="POST">
            <div class="w-full flex flex-col items-center">
                <input id="input_pseudo" name="input_pseudo" tabindex="0" class="w-full bg-white text-center placeholder-black focus:bg-gray-200" type="text" minlength="3" maxlength="30" placeHolder="Entrez votre pseudo">
            </div>
            <div class="flex flex-col items-center">
                <button type="submit" class="w-32 p-2 flex items-center justify-center font-[Inter] text-base text-white rounded-md cursor-pointer bg-linear-to-b from-cyan-300 to-blue-800 transition duration-300 hover:from-blue-800 hover:to-cyan-300 hover:brightness-110 focus:from-blue-800 focus:to-cyan-300 focus:brightness-110 lg:text-xl">Valider</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once __DIR__ . '/partials/footer.php';
?>
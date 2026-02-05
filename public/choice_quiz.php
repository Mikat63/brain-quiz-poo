<?php
require_once "../utils/autoloader.php";
session_start();
unset(
    $_SESSION['theme'],
    $_SESSION['theme'],
    $_SESSION['question_number'],
    $_SESSION['score']
);

require_once "../utils/is_connected.php";
$title = "Choix du quiz";
$backLink = "connexion.php";

require_once "./partials/page_infos.php";
require_once "./partials/header.php";
require_once "../utils/db_connect.php";

// load all themes
$request = $db->query(
    'SELECT
                            *
                        from
                            themes'
);

$themes = $request->fetchAll();

$themeObject = [];

foreach ($themes as $theme) {
    $themeObject[] = new Theme(theme: $theme['themes'], imgSmallSrc: $theme['img_small_src'], imgLargeSrc: $theme['img_large_src'], id: $theme['id']);
}

?>

<main class="min-h-svh flex flex-col items-center gap-8 justify-center overflow-hidden py-8">
    <!-- main container -->
    <div class="w-[80%] flex-1 flex flex-col items-center gap-8 pb-8 sm:w-[90%] lg:gap-11">
        <h2 class="text-2xl font-[Manrope] font-medium text-white lg:text-4xl">Choisissez un quiz</h2>

        <!-- quiz container -->
        <div class="w-full max-w-6xl mx-auto flex flex-col items-center gap-8 sm:w-full sm:flex-row sm:flex-wrap sm:justify-around ">
            <!-- container with 3 quiz cards links -->
            <?php

            foreach ($themeObject as $theme) {
                $imgQuiz = $theme->getImgSmallSrc();
                $altMessage = "quiz sur les " . $theme->getTheme();
                $quizName = $theme->getTheme();
                $srcSet = $theme->getImgSmallSrc() .  " 600w, " . $theme->getImgLargeSrc() . " 1024w";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = $theme->getId();
                require "./partials/quiz_card.php";
            }
            ?>

        </div>
</main>

<?php
require_once "partials/footer.php";
?>
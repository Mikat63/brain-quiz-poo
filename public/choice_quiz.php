<?php
session_start();
unset(
    $_SESSION['theme'],
    $_SESSION['questions'],
    $_SESSION['question_number'],
    $_SESSION['score']
);

require_once "utils/is_connected.php";
$title = "Choix du quiz";
$backLink = "connexion.php";

require_once "partials/page_infos.php";
require_once "partials/header.php";
require_once "process/db_connect.php";


$request = $db->query(
    'SELECT
                            *
                        from
                            themes'
);

$themes = $request->fetchAll();
?>



<main class="min-h-svh flex flex-col items-center gap-8 justify-center overflow-hidden py-8">
    <!-- main container -->
    <div class="w-[80%] flex-1 flex flex-col items-center gap-8 pb-8 lg:gap-11">
        <h2 class="text-2xl font-[Manrope] font-medium text-white lg:text-4xl">Choisissez un quiz</h2>

        <!-- quiz container -->
        <div class="w-[80%] max-w-6xl mx-auto flex flex-col items-center gap-8 md:w-full md:flex-row md:justify-around lg:flex-col">
            <!-- container with 3 quiz cards links -->
            <div class="w-full flex flex-col items-center gap-8 lg:flex-row">
                <?php
                $imgQuiz = "img/quiz_animals/quiz_animals_cover_1024.webp";
                $altMessage = "quiz sur les animaux";
                $quizName = "Animaux";
                $srcSet = "img/quiz_animals/quiz_animals_cover_600.webp 600w,img/quiz_animals/quiz_animals_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "1";

                require "partials/quiz_card.php";
                ?>

                <?php
                $imgQuiz = "img/quiz_cinema/quiz_cinema_cover_1024.webp";
                $altMessage = "quiz sur le cinéma";
                $quizName = "Cinéma";
                $srcSet = "img/quiz_cinema/quiz_cinema_cover_600.webp 600w,img/quiz_cinema/quiz_cinema_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "2";

                require "partials/quiz_card.php";
                ?>

                <?php
                $imgQuiz = "img/quiz_litterature/quiz_litterature_cover_1024.webp";
                $altMessage = "quiz sur la litterature";
                $quizName = "Littérature";
                $srcSet = "img/quiz_litterature/quiz_litterature_cover_600.webp 600w,img/quiz_litterature/quiz_litterature_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "3";

                require "partials/quiz_card.php";
                ?>
            </div>

            <!-- container with 3 quiz cards links -->
            <div class="w-full flex flex-col items-center gap-8 lg:flex-row">
                <?php
                $imgQuiz = "img/quiz_music/quiz_music_cover_1024.webp";
                $altMessage = "quiz sur la musique";
                $quizName = "Musique";
                $srcSet = "img/quiz_music/quiz_music_cover_600.webp 600w,img/quiz_music/quiz_music_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "4";

                require "partials/quiz_card.php";
                ?>

                <?php
                $imgQuiz = "img/quiz_science/quiz_science_cover_1024.webp";
                $altMessage = "quiz sur la science";
                $quizName = "Science";
                $srcSet = "img/quiz_science/quiz_science_cover_600.webp 600w,img/quiz_science/quiz_science_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "5";

                require "partials/quiz_card.php";
                ?>

                <?php
                $imgQuiz = "img/quiz_sport/quiz_sport_cover_1024.webp";
                $altMessage = "quiz sur le sport";
                $quizName = "Sport";
                $srcSet = "img/quiz_sport/quiz_sport_cover_600.webp 600w,img/quiz_sport/quiz_sport_cover_1024.webp 1024w ";
                $sizes = "(max-width: 600px) 600px, 1024px";
                $themeId = "6";

                require "partials/quiz_card.php";
                ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once "partials/footer.php";
?>
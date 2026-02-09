<?php
require_once "../utils/autoloader.php";

session_start();

require_once "../utils/is_connected.php";
require_once "../utils/is_quiz_started.php";
require_once "../utils/db_connect.php";

$userThemeRepo = new UserThemeRepository($db, new UserThemeMapper);

$podiumPlayersObjects = $userThemeRepo->findPodiumByTheme($_SESSION['theme']);
$fourthToTenthPlayersObjects = $userThemeRepo->FindFourthToTenthPlayersByTheme($_SESSION['theme']);


// page infos
$title = "Accueil";
$buttonLink = "choice_quiz.php";
$ariaDescription = "Revenir aux quiz";
$textButton = "Revenir aux quiz";
require_once "./partials/page_infos.php";
?>


<main class="min-h-svh flex flex-col items-center">
    <div>
        <?php require_once "./partials/logo.php" ?>
    </div>

    <!-- main container -->
    <div class="w-[80%] flex flex-col items-center gap-8 pb-6 sm:w-[50%] md:w-[70%] lg:w-[50%] 2xl:w-[30%]">

        <!-- podium container  -->
        <div class="w-full h-auto flex flex-col gap-8">
            <div class="w-full h-auto flex flex-col items-center gap-8 ">


                <!-- podium -->
                <div class="w-[80%] flex flex-row justify-between ">
                    <?php
                    // $player = $podiumPlayers[2]['user'];
                    $player = isset($podiumPlayersObjects[1]) ? $podiumPlayersObjects[1]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersObjects[1]) ? $podiumPlayersObjects[1]->getScore() : 'score';
                    $heightPodium = "h-12";
                    require "./partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayersObjects[0]) ? $podiumPlayersObjects[0]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersObjects[0]) ? $podiumPlayersObjects[0]->getScore() : 'score';
                    $heightPodium = "h-20";
                    require "./partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayersObjects[2]) ? $podiumPlayersObjects[2]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersObjects[2]) ? $podiumPlayersObjects[2]->getScore() : 'score';
                    $heightPodium = "h-16";
                    require "./partials/podium.php";
                    ?>
                </div>

                <div class="w-full h-auto flex flex-col gap-2">
                    <?php
                    foreach ($fourthToTenthPlayersObjects as $key => $fourthToTenthPlayerObject) {
                        $ariaLabelPosition = $key + 3 . "e position";
                        $position = $key + 3 . "e";
                        $player = $fourthToTenthPlayerObject->getUser()->getUsername();
                        $scorePlayer = $fourthToTenthPlayerObject->getScore();
                        require "./partials/ranking.php";
                    }
                    ?>
                </div>
            </div>


            <div>
                <?php require_once "./partials/start_button.php";  ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once "./partials/footer.php";
?>
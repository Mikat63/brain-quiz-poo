<?php
session_start();
require_once "process/db_connect.php";
require_once "utils/is_connected.php";
require_once "utils/is_quiz_started.php";


// podium query
$requestPodium = $db->prepare(
    'SELECT 
        u.user,
        ut.user_score
    FROM
        users AS u
    JOIN 
        users_themes AS ut ON u.id = ut.id_user
    WHERE
        ut.id_theme = :id_theme
    ORDER BY 
        ut.user_score DESC
    LIMIT 
        3'
);

$requestPodium->execute([
    'id_theme' => $_SESSION['theme']['id']
]);

$podiumPlayers = $requestPodium->fetchAll();

// players rth to 10th query

$requestOthersPlayers = $db->prepare(
    'SELECT 
        u.user,
        ut.user_score
    FROM
        users AS u
    JOIN 
        users_themes AS ut ON u.id = ut.id_user
    WHERE
        ut.id_theme = :id_theme
    ORDER BY 
        ut.user_score DESC
    LIMIT 
        7 
    OFFSET 
        3'
);

$requestOthersPlayers->execute([
    'id_theme' => $_SESSION['theme']['id']
]);

$fourthToTenthPlayers = $requestOthersPlayers->fetchAll();

$title = "Accueil";
$buttonLink = "choice_quiz.php";
$ariaDescription = "Revenir aux quiz";
$textButton = "Revenir aux quiz";
require_once "partials/page_infos.php";
?>


<main class="min-h-svh flex flex-col items-center">
    <div>
        <?php require_once "partials/logo.php" ?>
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
                    $player = isset($podiumPlayers[2]) ? $podiumPlayers[2]['user'] : 'Joueur';
                    $scorePlayer = isset($podiumPlayers[2]) ? $podiumPlayers[2]['user_score'] : 'score';
                    $heightPodium = "h-12";
                    require "partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayers[0]) ? $podiumPlayers[0]['user'] : 'Joueur';
                    $scorePlayer = isset($podiumPlayers[0]) ? $podiumPlayers[0]['user_score'] : 'Score';
                    $heightPodium = "h-20";
                    require "partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayers[1]) ? $podiumPlayers[1]['user'] : 'Joueur';
                    $scorePlayer = isset($podiumPlayers[1]) ? $podiumPlayers[1]['user_score'] : 'Score';
                    $heightPodium = "h-16";
                    require "partials/podium.php";
                    ?>
                </div>

                <div class="w-full h-auto flex flex-col gap-2">
                    <?php
                    foreach ($fourthToTenthPlayers as $key => $player) {
                        $ariaLabelPosition = $key + 3 . "e position";
                        $position = $key + 3 . "e";
                        $pseudo = isset($player['user']) ? $player['user'] : 'Joueur';
                        $score = isset($player['user_score']) ? $player['user_score'] : 'Score';
                        require "partials/ranking.php";
                    }
                    ?>
                </div>
            </div>


            <div>
                <?php require_once "partials/start_button.php";  ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once "partials/footer.php";
?>
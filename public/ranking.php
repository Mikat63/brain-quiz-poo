<?php
require_once "../utils/autoloader.php";

session_start();
require_once "../utils/db_connect.php";
require_once "../utils/is_connected.php";
require_once "../utils/is_quiz_started.php";


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
    'id_theme' => $_SESSION['theme']->getId()
]);

$podiumPlayers = $requestPodium->fetchAll();

$podiumPlayersArray = [];

foreach ($podiumPlayers as $podiumPlayer) {
    $userPodium = new User($podiumPlayer['user']);
    $podiumPlayersArray[] = new UserTheme(user: $userPodium, theme: $_SESSION['theme'], score: $podiumPlayer['user_score']);
}

// players 3th to 10th query
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
    'id_theme' => $_SESSION['theme']->getId()
]);

$fourthToTenthPlayers = $requestOthersPlayers->fetchAll();

$fourthToTenthPlayersArray = [];

foreach ($fourthToTenthPlayers as $fourthToTenthPlayer) {
    $userRanking = new User($fourthToTenthPlayer['user']);
    $fourthToTenthPlayersArray[] = new UserTheme(user: $userRanking, theme: $_SESSION['theme'], score: $fourthToTenthPlayer['user_score']);
}


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
                    $player = isset($podiumPlayersArray[1]) ? $podiumPlayersArray[1]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersArray[1]) ? $podiumPlayersArray[1]->getScore() : 'score';
                    $heightPodium = "h-12";
                    require "./partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayersArray[0]) ? $podiumPlayersArray[0]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersArray[0]) ? $podiumPlayersArray[0]->getScore() : 'score';
                    $heightPodium = "h-20";
                    require "./partials/podium.php";
                    ?>

                    <?php
                    $player = isset($podiumPlayersArray[2]) ? $podiumPlayersArray[2]->getUser()->getUsername() : 'Joueur';
                    $scorePlayer = isset($podiumPlayersArray[2]) ? $podiumPlayersArray[2]->getScore() : 'score';
                    $heightPodium = "h-16";
                    require "./partials/podium.php";
                    ?>
                </div>

                <div class="w-full h-auto flex flex-col gap-2">
                    <?php
                    foreach ($fourthToTenthPlayersArray as $key => $fourthToTenthPlayerArray) {
                        $ariaLabelPosition = $key + 3 . "e position";
                        $position = $key + 3 . "e";
                        $player = $fourthToTenthPlayerArray->getUser()->getUsername();
                        $scorePlayer = $fourthToTenthPlayerArray->getScore();
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
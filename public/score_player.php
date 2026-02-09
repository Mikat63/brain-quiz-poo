<?php
require_once "../utils/autoloader.php";

session_start();
require_once "../utils/is_connected.php";
require_once "../utils/is_quiz_started.php";

$title = "Score";
require_once "./partials/page_infos.php";
require_once "../utils/db_connect.php";

$userRepo = new UserThemeRepository($db, new UserThemeMapper);

$userScoreObject = $userRepo->findOneByIdAndTheme($_SESSION['user'], $_SESSION['theme']);


// Save score: INSERT if new, UPDATE if better
if (!$userScoreObject) {

    $insertUserScore = $userRepo->InsertScore($_SESSION['user'], $_SESSION['theme'], $_SESSION['score']);


    } elseif ($_SESSION['score'] > $userScore['user_score']) {
    $request = $db->prepare(
        'UPDATE 
                users_themes
            SET
                user_score = :score
            WHERE 
                id_user = :player_id AND id_theme = :theme_id'
    );

    $request->execute([
        'score' => $_SESSION['score'],
        'player_id' => $_SESSION['user']->getId(),
        'theme_id' => $_SESSION['theme']->getId()
    ]);
}

// Re-fetch the score query for best score 
$request = $db->prepare(
    'SELECT 
        user_score
    FROM
        users_themes
    WHERE 
        id_user = :player_id AND id_theme = :theme_id'
);

$request->execute([
    'player_id' => $_SESSION['user']->getId(),
    'theme_id' => $_SESSION['theme']->getId()
]);

$userScore = $request->fetch();

$userObject = new UserTheme(user: $_SESSION['user'], theme: $_SESSION['theme'], score: $userScore['user_score']);

?>


<main class="min-h-svh flex flex-col items-center justify-center">
    <!-- main container -->
    <div class="w-[80%] flex-1 flex flex-col items-center justify-between pb-8">
        <?php require_once "./partials/logo.php";  ?>

        <div class="w-full h-auto flex flex-col gap-4 ">
            <div class=" w-full h-auto flex flex-col items-center">
                <h2 class="font-[Manrope] text-[24px] font-bold text-white">MEILLEUR SCORE</h2>
                <p class="font-[Manrope] text-[20px] font-semibold text-yellow-400"><?= $userObject->getScore() ?></p>
            </div>

            <div class=" w-full h-auto flex flex-col items-center">
                <h2 class="font-[Manrope] text-[24px] font-bold text-white"> SCORE</h2>
                <p class="font-[Manrope] text-[20px] font-semibold text-yellow-400"><?= $_SESSION['score'] ?></p>
            </div>
        </div>

        <div class="W-full h-auto flex flex-col items-center justify-center gap-4 sm:flex-row">

            <?php
            $buttonLink = "ranking.php";
            $ariaDescription = "Voir le classement";
            $textButton = "Voir le classement";
            require "./partials/start_button.php";
            ?>

            <?php
            $buttonLink = "choice_quiz.php";
            $ariaDescription = "Revenir au choix du quiz";
            $textButton = "Retour aux quiz";
            require "./partials/start_button.php"; ?>
        </div>
    </div>
</main>

<?php
require_once "./partials/footer.php";
?>
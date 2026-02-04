<?php
session_start();
require_once "utils/is_connected.php";
require_once "utils/is_quiz_started.php";

$title = "Score";
require_once "partials/page_infos.php";
require_once "process/db_connect.php";

// query for the  best score
$request = $db->prepare(
    'SELECT 
                            user_score
                        FROM
                            users_themes
                        WHERE 
                            id_user = :player_id AND id_theme = :theme_id'
);

$request->execute([
    'player_id' => $_SESSION['user_id'],
    'theme_id' => $_SESSION['theme']['id']
]);

$userScore = $request->fetch();

// Save score: INSERT if new, UPDATE if better
if (!$userScore) {
    $request = $db->prepare(
        'INSERT INTO 
                users_themes(id_user,id_theme,user_score)
         VALUES
                (:user_id,
                 :theme_id,
                 :score_user
                 )'
    );

    $request->execute([
        'user_id' => $_SESSION['user_id'],
        'theme_id' => $_SESSION['theme']['id'],
        'score_user' => $_SESSION['score']
    ]);
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
        'player_id' => $_SESSION['user_id'],
        'theme_id' => $_SESSION['theme']['id']
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
    'player_id' => $_SESSION['user_id'],
    'theme_id' => $_SESSION['theme']['id']
]);

$userScore = $request->fetch();
?>


<main class="min-h-svh flex flex-col items-center justify-center">
    <!-- main container -->
    <div class="w-[80%] flex-1 flex flex-col items-center justify-between pb-8">
        <?php require_once "partials/logo.php";  ?>

        <div class="w-full h-auto flex flex-col gap-4 ">
            <div class=" w-full h-auto flex flex-col items-center">
                <h2 class="font-[Manrope] text-[24px] font-bold text-white">MEILLEUR SCORE</h2>
                <p class="font-[Manrope] text-[20px] font-semibold text-yellow-400"><?= $userScore['user_score'] ?></p>
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
            require "partials/start_button.php";
            ?>

            <?php
            $buttonLink = "choice_quiz.php";
            $ariaDescription = "Revenir au choix du quiz";
            $textButton = "Retour aux quiz";
            require "partials/start_button.php"; ?>
        </div>
    </div>
</main>

<?php
require_once "partials/footer.php";
?>
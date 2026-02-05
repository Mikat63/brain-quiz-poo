<?php
require_once "../utils/autoloader.php";
session_start();
require_once '../utils/is_connected.php';
require_once '../utils/is_quiz_started.php';

$title = "quiz";
$backLink = "choice_quiz.php";
require_once './partials/page_infos.php';
?>


<header class="w-full flex flex-row items-center justify-between p-2">
    <div class="w-10 flex flex-col items-center">
        <a href="<?= $backLink ?>" aria-label="Retourner à la page précédente" class="transition hover:scale-150 focus:scale-150 focus:outline-none"><img src="assets/img/back_button.webp" alt="bouton retour"></a>
    </div>

    <div class="w-auto h-auto flex flex-col items-center px-2 border border-solid border-white rounded-sm font-[Manrope] text-white ">
        <p id="counter_question" class="flex flex-col items-center p-1"><?= $_SESSION['question_number'] + 1 . "/" . count($_SESSION['theme']->getQuestions()) ?></p>
    </div>
</header>

<main class="flex flex-col items-center gap-4 opacity-100 sm:gap-8 lg:gap-16 2xl:gap-24">
    <!-- main container -->
    <div class="w-[70%] flex flex-col items-center gap-8 sm:w-[40%] lg:w-[30%] lg:gap-11 2xl:w-[20%] ">
        <!-- progression bar  -->
        <div class="w-full h-4 bg-gray-200 rounded-full dark:bg-gray-700 mt-4">
            <div id="timer-bar" class="w-full h-4 bg-green-600 rounded-full transition-all duration-100"></div>
        </div>
        <!-- quiz container -->
        <div id="quiz_container" class="w-full flex flex-col gap-4 justify-center ">
            <div class="w-full h-60">
                <img id="img_question"
                    class="w-full h-full object-cover"
                    src="<?= $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getImgSmallSrc() ?>"
                    srcset="<?= $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getImgSmallSrc() . " 600w, " . $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getImgLargeSrc() . " 1024" ?>"
                    alt="Image de la question">
            </div>
            <div class="w-full h-auto text-[20px] text-center font-[Inter] text-white lg:text-xl">
                <p id="question"><?= $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getQuestion() ?> </p>
            </div>
            <!-- answers container -->
            <div id="answer_container" class="w-full h-auto flex flex-col gap-2 items-center">
                <?php
                foreach ($_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getAnswers() as $answer) {
                    $answerText = $answer->getAnswer();
                    $dataAnswer = $answer->getId();
                    $dataQuestion = $_SESSION['theme']->getQuestions()[$_SESSION['question_number']]->getId();
                    require './partials/answer_button.php';
                }
                ?>
            </div>
        </div>
</main>

<?php
require_once './partials/footer.php';
?>
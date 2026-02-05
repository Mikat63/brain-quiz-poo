<div class="w-[80%] sm:w-1/2 md:w-1/3 flex justify-center">
    <a href="../process/theme.php?id=<?= $themeId ?>" class="w-full cursor-pointer focus:scale-110" aria-label=<?= " aller vers le quiz $quizName" ?>>
        <div class="w-full flex flex-col gap-4 justify-center">
            <div class="w-full aspect-square bg-black border-2">
                <img class="w-full h-full object-cover" src="<?= $imgQuiz ?>" alt="<?= $altMessage ?>" loading="lazy" srcset="<?= $srcSet ?>" sizes="<?= $sizes ?>">
            </div>

            <h3 class="w-full text-base text-center truncate font-[Inter] text-white lg:text-xl"><?= $quizName ?></h3>
        </div>
    </a>
</div>
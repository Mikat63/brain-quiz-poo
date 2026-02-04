<button class="answer_btn w-full h-auto p-2 rounded-lg text-[20px] text-white bg-[#0879C9] cursor-pointer focus:scale-110 focus:outline-0" data-answer="<?= htmlspecialchars(strip_tags($dataAnswer)) ?>" data-question="<?= htmlspecialchars(strip_tags($dataQuestion)) ?>">
    <?= htmlspecialchars(strip_tags($answerText)) ?>
</button>
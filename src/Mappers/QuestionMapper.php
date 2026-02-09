<?php

final class QuestionMapper
{

    public function mapToObject($data, Theme $theme): Question
    {
        return new Question
        (
            question: $data['question'],
            theme: $theme,
            imgSmallSrc: $data['img_path_mobile'],
            imgLargeSrc: $data['img_path_desktop'],
            id: $data['id']
        );
    }
}

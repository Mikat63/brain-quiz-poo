<?php

final class AnswerMapper
{

    public function mapToObject($data, $question): Answer
    {
        return new Answer(
                answer: $data['answer'],
                goodAnswer: $data['good_answer'],
                question: $question,
                id: $data['id']
            );
    }
}

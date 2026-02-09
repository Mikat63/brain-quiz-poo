<?php

final class AnswerRepository
{

    public function __construct(private PDO $db, private AnswerMapper $mapper) {}

    public function findAllByQuestion(Question $question): array
    {


        $request = $this->db->prepare(
            'SELECT
                                * 
                            FROM 
                                answers 
                            WHERE
                                id_question = :question_id'
        );

        $request->execute([
            'question_id' => $question->getId()
        ]);

        $answersDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $answersArray = [];


        if ($answersDatas) {
            foreach ($answersDatas as $answerData) {
                $answersArray[] = $this->mapper->mapToObject($answerData, $question);
            }
        }

        return $answersArray;
    }
}

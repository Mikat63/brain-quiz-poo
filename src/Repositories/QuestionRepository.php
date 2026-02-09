<?php

final class QuestionRepository
{

    public function __construct(private PDO $db, private QuestionMapper $mapper) {}


    public function findAllByTheme(Theme $theme): array
    {
        $request = $this->db->prepare(
            'SELECT 
                          *
                         FROM
                            questions 
                        WHERE id_theme = :theme_quiz'
        );

        $request->execute([
            'theme_quiz' => $theme->getId()
        ]);

        $questionsDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $questionsArray = [];
        if ($questionsDatas) {
            foreach ($questionsDatas as $questionData) {
                $questionsArray[] = $this->mapper->mapToObject($questionData, $theme);
            }
        };
        return $questionsArray;
    }
}

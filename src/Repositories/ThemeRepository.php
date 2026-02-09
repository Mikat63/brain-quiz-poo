<?php

final class ThemeRepository
{

    public function __construct(private PDO $db, private ThemeMapper $mapper) {}

    public function findAll(): array
    {
        $request = $this->db->prepare(
            'SELECT
                            *
                        from
                            themes'
        );

        $request->execute();

        $themesData = $request->fetchAll(PDO::FETCH_ASSOC);

        $themesArray = [];

        foreach ($themesData as $themeData) {
            $themesArray[] = $this->mapper->mapToObject($themeData);
        }


        return $themesArray;
    }

    public function findOneById(int $id): ?Theme
    {
        $request = $this->db->prepare(
            'SELECT * 
             FROM themes 
             WHERE id = :themeId'
        );

        $request->execute([
            'themeId' => $id
        ]);

        $themeData = $request->fetch(PDO::FETCH_ASSOC);

        if($themeData){
            return $this->mapper->mapToObject($themeData);
        }

        return null;
    }
}

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
}

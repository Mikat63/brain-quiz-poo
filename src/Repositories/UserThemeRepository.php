<?php

final class UserThemeRepository
{
    public function __construct(private PDO $db, private UserThemeMapper $mapper) {}

    public function findPodiumByTheme(Theme $themeObject): array
    {

        $requestPodium = $this->db->prepare(
            'SELECT 
                u.user,
                ut.id_theme,
                ut.user_score
            FROM
                 users AS u
            JOIN 
                 users_themes AS ut ON u.id = ut.id_user
            WHERE
                ut.id_theme = :id_theme
            ORDER BY 
                ut.user_score DESC
            LIMIT 
                3'
        );

        $requestPodium->execute([
            'id_theme' => $themeObject->getId()
        ]);

        $podiumPlayers = $requestPodium->fetchAll();

        $podiumPlayersObjectsArray = [];

        foreach ($podiumPlayers as $podiumPlayer) {
            $podiumPlayersObjectsArray[] = $this->mapper->mapToObject($podiumPlayer, $themeObject);
        }

        return $podiumPlayersObjectsArray;
    }

    public function FindFourthToTenthPlayersByTheme(Theme $themeObject): array
    {

        $requestPlayers = $this->db->prepare(
            'SELECT 
                u.user,
                u.id,
                ut.id_theme,
                ut.user_score
            FROM
                 users AS u
            JOIN 
                 users_themes AS ut ON u.id = ut.id_user
            WHERE
                ut.id_theme = :id_theme
            ORDER BY 
                ut.user_score DESC
            LIMIT 
                7
            OFFSET
                3'
        );

        $requestPlayers->execute([
            'id_theme' => $themeObject->getId()
        ]);

        $fourthToTenthPlayers = $requestPlayers->fetchAll();

        $fourthToTenthPlayersObjectsArray = [];

        foreach ($fourthToTenthPlayers as $fourthToTenthPlayer) {
            $fourthToTenthPlayersObjectsArray[] = $this->mapper->mapToObject($fourthToTenthPlayer, $themeObject);
        }

        return $fourthToTenthPlayersObjectsArray;
    }
}

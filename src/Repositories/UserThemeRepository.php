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

    public function findOneByIdAndTheme(User $userObject, Theme $themeObject): ?UserTheme
    {

        $request = $this->db->prepare(
            'SELECT 
                            u.user,
                            ut.user_score
                        FROM
                            users_themes AS ut
                        JOIN users As u ON u.id = ut.id_user
                        WHERE 
                            ut.id_user = :player_id AND ut.id_theme = :theme_id'
        );

        $request->execute([
            'player_id' => $userObject->getId(),
            'theme_id' => $themeObject->getId()
        ]);

        $userScore = $request->fetch();

        if ($userScore) {
            return $this->mapper->mapToObject($userScore, $themeObject);
        };

        return null;
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

    public function InsertScore(User $user, Theme $theme, int $score): ?UserTheme
    {
        $request = $this->db->prepare(
            'INSERT INTO 
                users_themes(id_user,id_theme,user_score)
         VALUES
                (:user_id,
                 :theme_id,
                 :score_user
                 )'
        );

        $request->execute([
            'user_id' => $user->getId(),
            'theme_id' => $theme->getId(),
            'score_user' => $score
        ]);


        return $this->findOneByIdAndTheme($user, $theme);
    }
}

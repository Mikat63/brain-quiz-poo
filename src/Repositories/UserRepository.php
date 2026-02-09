<?php

final class UserRepository
{


    public function __construct(private PDO $db, private UserMapper $mapper) {}

    public function findOneByUsername(string $userName): ?User
    {

        $request = $this->db->prepare(
            "SELECT
                            *
                       FROM 
                            users
                       WHERE user = :player"
        );

        $request->execute([
            ":player" => $userName
        ]);

        $userData = $request->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return $this->mapper->mapToObject($userData);
        }

        return null;
    }

    public function insertOne(User $user): User
    {
        $request = $this->db->prepare(
            "INSERT INTO users (user)
             VALUES (:input_pseudo)"
        );

        $request->execute($this->mapper->mapToArray($user));


        return $this->findOneByUsername($user->getUsername());
    }
}

<?php

final class UserRepository
{


    public function __construct(private PDO $db, private UserMapper $mapper) {}

    public function findOneByUsername(string $user): ?User
    {

        $request = $this->db->prepare(
            "SELECT
                            *
                       FROM 
                            users
                       WHERE user = :player"
        );

        $request->execute([
            ":player" => $user
        ]);

        $userData = $request->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return $this->mapper->mapToObject($userData);
        }

        return null;
    }

    public function insertOne(string $data): ?User
    {
        $request = $this->db->prepare(
            "INSERT INTO users (user)
             VALUES (:input_pseudo)"
        );

        $request->execute([
            ":input_pseudo" => $data
        ]);

        $id =  $this->db->lastInsertId();

        $userData = [
            'username' => $data,
            'id' => $id
        ];

        return $this->mapper->mapToObject($userData);
    }
}

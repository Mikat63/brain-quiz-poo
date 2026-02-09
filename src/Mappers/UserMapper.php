<?php

final class UserMapper
{

    public function mapToObject(array $data): User
    {
        return new User(
            $data['user'],
            $data['id']

        );
    }

    public function mapToArray(User $user): array
    {
        return  [
            ":input_pseudo" => $user->getUsername()
        ];
    }
}

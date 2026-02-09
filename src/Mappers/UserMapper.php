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
}

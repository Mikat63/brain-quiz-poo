<?php

final Class UserMapper {

    public function mapToObject( array $data): User 
    {
        return new User(
            $data['id'],
            $data['username']
        ); 
    }
}
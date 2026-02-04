<?php

final class User
{

    public function __construct(private string $username, private ?int $id = null) {}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

<?php

final class UserTheme
{
    public function __construct(private User $user, private Theme $theme, private int $score, private ?int $id = null) {}

    public function getUser(): User
    {
        return $this->user;
    }

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

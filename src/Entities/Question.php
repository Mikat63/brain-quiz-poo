<?php

final class Question
{

    public function __construct(private string $question, private Theme $theme, private ?int $id = null) {}

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): Theme
    {
        return $this->theme;
    }
}

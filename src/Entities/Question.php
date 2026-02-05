<?php

final class Question
{

    public function __construct(private string $question, private Theme $theme, private string $imgSmallSrc, private string $imgLargeSrc, private ?array $answers = null, private ?int $id = null) {}

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getAnswers(): ?array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): self
    {
        $this->answers = $answers;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    public function getImgSmallSrc(): string
    {
        return $this->imgSmallSrc;
    }

    public function getImgLargeSrc(): string
    {
        return $this->imgLargeSrc;
    }
}

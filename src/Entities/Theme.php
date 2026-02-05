<?php

final class Theme
{

    public function __construct(private string $theme, private string $imgSmallSrc, private string $imgLargeSrc, private ?array $questions = null, private ?int $id = null) {}

    public function getTheme(): string
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


    public function getQuestions(): ?array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): self
    {
        $this->questions = $questions;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

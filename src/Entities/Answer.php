<?php

final class Answer
{

    public function __construct(private string $answer, private bool $goodAnswer, private Question $question, private ?int $id = null) {}

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function getGoodAnswer(): bool
    {
        return $this->goodAnswer;
    }
}

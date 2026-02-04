<?php

final class Theme
{

    public function __construct(private string $theme, private ?int $id = null) {}

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getId(): int
    {
        return $this->?id;
    }
}

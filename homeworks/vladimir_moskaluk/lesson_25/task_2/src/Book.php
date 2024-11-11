<?php

declare(strict_types=1);

namespace App\Task2;

class Book
{
    private int $id;
    private string $title;
    private int $authorId;
    private bool $isAvailable;

    public function __construct(int $id, string $title, int $authorId, bool $isAvailable = true)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authorId = $authorId;
        $this->isAvailable = $isAvailable;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setAvailability(bool $availability): void
    {
        $this->isAvailable = $availability;
    }
}

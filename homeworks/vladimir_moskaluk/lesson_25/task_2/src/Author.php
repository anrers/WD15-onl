<?php

declare(strict_types=1);

namespace App\Task2;

class Author
{
    private int $id;
    private string $lastName;

    public function __construct(int $id, string $lastName)
    {
        $this->id = $id;
        $this->lastName = $lastName;
    }

    public function getId(): int
    {
        return $this->id;

    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}

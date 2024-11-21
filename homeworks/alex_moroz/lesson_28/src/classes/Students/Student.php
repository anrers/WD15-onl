<?php

namespace Students;

class Student
{
    private string $id;
    public function __construct(
        private string $name,
        private string $email,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
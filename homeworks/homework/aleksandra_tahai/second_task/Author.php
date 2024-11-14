<?php

class Author
{
    public function __construct(
        protected int $id,
        protected string $lastName
    ) {
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

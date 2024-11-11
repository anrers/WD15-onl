<?php

namespace Libraries;

class Author
{
    public function __construct(
        private string $id,
        private string $last_name,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }
}
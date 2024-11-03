<?php

class Author
{
    public function __construct(
        public int $id,
        public string $last_name,
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
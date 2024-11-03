<?php

class Book
{
    public function __construct(
        public string $title,
        public int    $author_id,
        public bool   $is_available,
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isAvailable(): bool
    {
        return $this->is_available;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }
}
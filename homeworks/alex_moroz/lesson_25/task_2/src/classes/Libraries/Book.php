<?php

namespace Libraries;

class Book
{
    public function __construct(
        private int $id,
        private string $title,
        private string $author_id,
        private string $is_available,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isAvailable(): string
    {
        return $this->is_available;
    }

    public function getAuthorId(): string
    {
        return $this->author_id;
    }
}
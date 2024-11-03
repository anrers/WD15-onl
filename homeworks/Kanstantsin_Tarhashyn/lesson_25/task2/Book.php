<?php

class Book
{
    public function __construct(
        private string $title,
        private int $author_id,
        private bool $is_available,
    ) {
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function isAvailable()
    {
        return $this->is_available;
    }

    public function setAvailability($is_available)
    {
        $this->is_available = $is_available;
    }
}
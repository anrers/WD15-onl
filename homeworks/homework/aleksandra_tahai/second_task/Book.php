<?php
require_once 'Author.php';

class Book
{
    public function __construct(
        protected string $title,
        protected Author $author,
        protected bool $accessibility,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getAccessibility(): bool
    {
        return $this->accessibility;
    }

    public function changeAccessibility(bool $accessibility)
    {
        $this->accessibility = $accessibility;
    }
}

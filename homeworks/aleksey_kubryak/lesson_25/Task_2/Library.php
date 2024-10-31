<?php

require_once 'Book.php';
require_once 'Author.php';

class Library 
{
    public function __construct(
        public array $books = [],
    ) {
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book): void {
        foreach ($this->books as $key => $value) {
            if ($value->getTitle() === $book->getTitle()) {
                unset($this->books[$key]);
                return;
            }
        }
    }

    public function getBooks(): array 
    {
        return $this->books;
    }

    public function getAvailableBooks(): array 
    {
        return array_filter($this->books, fn($book) => $book->isAvailable());
    }

    public function getBookByTitle($title): ?Book 
    {
        foreach ($this->books as $value) {
            if ($value->getTitle() === $title) {
                return $value;
            }
        }
        return null;
    }

    public function getBooksByAuthor(Author $author): array 
    {
        return array_filter($this->books, fn($book) => $book->getAuthorId() === $author->getId());
    }
}
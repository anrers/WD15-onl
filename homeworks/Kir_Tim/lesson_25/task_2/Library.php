<?php

require_once 'Author.php';
require_once 'Book.php';

class Library
{
    public function __construct(
        public array $books
    )
    {
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book): void
    {
        foreach ($this->books as $key => $value) {
            if ($value->getTitle() == $book->getTitle()) {
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
        $availableBooks = [];
        foreach ($this->books as $book) {
            if ($book->isAvailable() == 1) {
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }

    public function getBookByTitle($title)
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title) {
                return $book;
            }
        }
        return "Книга не найдена";
    }

    public function getBooksByAuthor($author): string
    {
        foreach ($this->books as $book) {
            if ($book->getAuthor() == $author) {
                return $book;
            }
        }
        return "Книга не найдена";
    }
}
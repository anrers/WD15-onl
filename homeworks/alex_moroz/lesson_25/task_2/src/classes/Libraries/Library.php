<?php

namespace Libraries;

class Library
{
    private array $books = [];

    public function addBook(Book $book)
    {
        $this->books[$book->getId()] = $book;
    }

    public function removeBook(Book $book)
    {
        if (isset($this->books[$book->getId()])) {
            unset($this->books[$book->getId()]);
        }
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getAvailableBooks()
    {
        return array_filter($this->books, fn($book) => $book->isAvailable());
    }

    public function getBookByTitle(string $title)
    {
        return array_filter($this->books, fn (Book $book) => strtolower($book->getTitle()) == strtolower(trim($title)));
    }

    public function getBooksByAuthor(Author $author)
    {
        return array_filter($this->books, fn (Book $book) => $book->getAuthorId() == $author->getId());
    }
}
<?php

namespace Libraries;

class Library
{
    private array $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book)
    {
        if (array_search($book, $this->books)) {
            unset($this->books[array_search($book, $this->books)]);
            $this->books = array_values($this->books);
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

    public function getBookByTitle($title)
    {
        return array_filter($this->books, fn (Book $book) => strtolower(trim($book->getTitle())) == strtolower(trim($title)));
    }

    public function getBooksByAuthor(Author $author)
    {
        return array_filter($this->books, fn (Book $book) => $book->getAuthorId() == $author->getId());
    }
}
<?php
require_once 'Book.php';
require_once 'Author.php';

class Library
{
    private array $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book)
    {
        foreach ($this->books as $index => $b)
        {
            if ($b === $book)
            {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return;
            }
        }
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getAvailableBooks()
    {
        $availableBooks = [];
        foreach ($this->books as $book)
        {
            if ($book->isAvailable())
            {
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }

    public function getBookByTitle($title)
    {
        foreach ($this->books as $book)
        {
            if ($book->getTitle() === $title)
            {
                return $book;
            }
        }
        return null;
    }

    public function getBooksByAuthor(Author $author)
    {
        $authorBooks = [];
        foreach ($this->books as $book)
        {
            if ($book->getAuthorId() === $author->getId())
            {
                $authorBooks[] = $book;
            }
        }
        return $authorBooks;
    }
}
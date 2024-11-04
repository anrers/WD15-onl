<?php
require_once 'Book.php';
require_once 'Author.php';

class Library
{
    private array $books = [];

    public function addBook(Book $book)
    {
        $this->books[$book->getId()] = $book;
    }

    public function removeBook($bookId)
    {
        if (isset($this->books[$bookId])) {
            unset($this->books[$bookId]);
            return;
        }
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getAvailableBooks()
    {
        $availableBooks = [];
        foreach ($this->books as $book) {
            if ($book->isAvailable()) {
                $availableBooks[$book->getId()] = $book;
            }
        }
        return $availableBooks;
    }

    public function getBookByTitle($title)
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }

    public function getBooksByAuthor(Author $author)
    {
        $authorBooks = [];
        foreach ($this->books as $book) {
            if ($book->getAuthorId() === $author->getId()) {
                $authorBooks[] = $book;
            }
        }
        return $authorBooks;
    }
}
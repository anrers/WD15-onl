<?php
require_once 'Author.php';
require_once 'Book.php';

class Library
{
    protected array $books = [];

    public function addBook(Book $book, int $id): void
    {
        if (key_exists($id, $this->books)) {
            throw new InvalidArgumentException("Книга с ID $id уже существует в библиотеке.");
        } else {
            $this->books[$id] = $book;
        }
    }

    public function removeBook(int $id)
    {
        if (key_exists($id, $this->books)) {
            unset($this->books[$id]);
        } else {
            return false;
        }
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getAvailableBooks(): array
    {
        $avalableBooks = [];
        foreach ($this->books as $book) {
            if ($book->getIsAvailable() === true) {
                $avalableBooks[] = $book;
            } else {
                continue;
            }
        }
        return $avalableBooks;
    }

    public function getBookByTitle($title)
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title) {
                return $book;
            } else {
                return "Book is not found";
            }
        }
    }

    public function getBooksByAuthor(Author $author)
    {
        foreach ($this->books as $book) {
            if ($book->getAuthor() == $author) {
                return $book;
            } else {
                return "Author is not found";
            }
        }
    }
}




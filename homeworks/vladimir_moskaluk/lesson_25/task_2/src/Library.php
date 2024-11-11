<?php

declare(strict_types=1);

namespace App\Task2;

class Library
{
    private array $books = []; // Книги теперь хранятся по ключу id

    public function addBook(Book $book): void
    {
        $this->books[$book->getId()] = $book;
    }

    public function removeBook(int $bookId): void
    {
        unset($this->books[$bookId]);
    }

    public function getBooks(): array
    {
        return array_values($this->books);
    }

    public function getAvailableBooks(): array
    {
        return array_filter($this->books, fn(Book $book) => $book->isAvailable());
    }

    public function getBookByTitle(string $title): ?Book
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }

    public function getBooksByAuthor(int $authorId): array
    {
        return array_filter($this->books, fn(Book $book) => $book->getAuthorId() === $authorId);
    }
}

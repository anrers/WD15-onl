<?php

require_once 'dbLibrary.php';
require_once 'Book.php';
require_once 'Author.php';

global $books, $authors;

class Library
{
    public function __construct(
        public array $bookArray,
        public array $authorArray,
    ) {}

        public function addBook(Book $book): void
        {
            $this->bookArray[$book->id] = $book;
        }
        public function removeBook(Book $book): void
        {
            unset($this->bookArray[$book->id]);
        }

        public function getBooks(): array
        {
            return $this->bookArray;
        }
        public function getAvailableBooks(): array
        {
            $availableBooks = [];
            foreach ($this->bookArray as $book) {
                if ($book->isAvailabe == 1) {
                    $availableBooks[] = $book;
                }
            }
            return $availableBooks;
        }
        public function getBookByTitle(string $title): array
        {
            $selectedTitleBooks = [];
            foreach ($this->bookArray as $book) {
                if ($book->title == $title) {
                    $selectedTitleBooks[$book->id] = $book;
                }
            }
            return $selectedTitleBooks;
        }

        public function getBooksByAuthor(string $author): array
        {
            $idAuthor = 0;
            $authorBooks = [];
            foreach ($this->authorArray as $author) {
                if ($author->lastName == $author) {
                    $idAuthor = $author->id;
                }
            }
            foreach ($this->bookArray as $book) {
                if ($book->authorId == $idAuthor) {
                    $authorBooks[] = $book;
                }
            }
            return $authorBooks;
        }
}




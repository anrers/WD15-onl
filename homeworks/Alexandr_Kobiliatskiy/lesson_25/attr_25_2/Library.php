<?php

//require_once 'dbLibrary.php';
//require_once 'Book.php';
//require_once 'Author.php';

global $books, $authors;
require_once 'C:\Users\admin\WD15-onl\homeworks\Alexandr_Kobiliatskiy\lesson_25\attr_25_2\Book.php';
require_once 'C:\Users\admin\WD15-onl\homeworks\Alexandr_Kobiliatskiy\lesson_25\attr_25_2\Author.php';
require_once 'C:\Users\admin\WD15-onl\homeworks\Alexandr_Kobiliatskiy\lesson_25\attr_25_2\dbLibrary.php';
class Library
{
    public function __construct(
        public array $bookArray,
        public array $authorArray,
    ) {}

        public function addBook(Book $book): void
        {
            $this->bookArray[] = $book;
        }
        public function removeBook(Book $book): void
        {
            foreach ($this->bookArray as $element) {
                if ($element === $book) {
                    unset($this->bookArray[array_search($element, $this->bookArray)]);
                }
            }
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
        public function getBookByTitle(string $title) {
            foreach ($this->bookArray as $book) {
                if ($book->title == $title) {
                    return $book;
                }
            }
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

//$library = new Library($books, $authors);
//
//$saltan = new Book(7, "Сказка о царе Салтане часть 2", 3, 1);
//
// $library->addBook($saltan);
// var_dump($library);
//
// $library->removeBook($saltan);
//
// var_dump($library->bookArray);
//
// var_dump($library->getAvailableBooks());
// var_dump($library->getBooksByAuthor('Михаил Юрьевич Лермонтов'));


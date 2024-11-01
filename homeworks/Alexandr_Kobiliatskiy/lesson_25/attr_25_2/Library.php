<?php
require_once 'C:\OSPanel\home\homework-25\attr_25_2\dbLibrary.php';
class Library
{
    public function __construct(
        public array $bookArray,
        public array $autorArray,
    ) {}

        public function addBook(Book $book) {
            $this->bookArray[] = $book;
        }
        public function removeBook(string $bookName, string $autorName) {
            foreach ($this->bookArray as $book) {
                if ($book->title == $bookName) {
                    foreach ($this->autorArray as $autor) {
                        if ($autor->lastName == $autorName) {
                            unset($this->bookArray[array_search($book, $this->bookArray)]);
                        }
                    }
                    
                }
            }
        }
        public function getBooks() {
            return $this->bookArray;
        }
        public function getAvailableBooks() {
            $availableBooks = [];
            foreach ($this->bookArray as $book) {
                if ($book->isAvailabe == 1) {
                    $availableBooks[] = $book;
                }
            }
            return $availableBooks;
        }
        public function getBookByTitle($title) {
            foreach ($this->bookArray as $book) {
                if ($book->title == $title) {
                    return $book;
                }
            }
        }

        public function getBooksByAuthor($author) {
            $idAutor = 0;
            $autorBooks = [];
            foreach ($this->autorArray as $autor) {
                if ($autor->lastName == $author) {
                    $idAutor = $autor->id;
                }
            }
            foreach ($this->bookArray as $book) {
                if ($book->autorId == $idAutor) {
                    $autorBooks[] = $book;
                }
            }
            return $autorBooks;
        }
}

// $bublioteca = new Library($boocs, $autors);

// $bublioteca->addBook(new Book(7, "Сказка о царе Салтане часть 2", 3, 1));
// var_dump($bublioteca);

// $bublioteca->removeBook("Сказка о царе Салтане часть 2", "Александр Сергеевич Пушкин");
// var_dump($bublioteca->bookArray);

// var_dump($bublioteca->getAvailableBooks()); 
// var_dump($bublioteca->getBooksByAuthor('Михаил Юрьевич Лермонтов')); 


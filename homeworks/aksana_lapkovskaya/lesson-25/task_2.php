<?php

class Book {
    private $title;
    private $author_id;
    private $is_available;

    public function __construct($title, $author_id, $is_available = true) {
        $this->title = $title;
        $this->author_id = $author_id;
        $this->is_available = $is_available;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthorId() {
        return $this->author_id;
    }

    public function isAvailable() {
        return $this->is_available;
    }

    public function setAvailability($is_available) {
        $this->is_available = $is_available;
    }
}

class Author {
    private $id;
    private $last_name;

    public function __construct($id, $last_name) {
        $this->id = $id;
        $this->last_name = $last_name;
    }

    public function getId() {
        return $this->id;
    }

    public function getLastName() {
        return $this->last_name;
    }
}

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBook(Book $book) {
        foreach ($this->books as $key => $b) {
            if ($b === $book) {
                unset($this->books[$key]);
            }
        }
        $this->books = array_values($this->books);
    }

    public function getBooks() {
        return $this->books;
    }

    public function getAvailableBooks() {
        return array_filter($this->books, function ($book) {
            return $book->isAvailable();
        });
    }

    public function getBookByTitle($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }

    public function getBooksByAuthor(Author $author) {
        return array_filter($this->books, function ($book) use ($author) {
            return $book->getAuthorId() === $author->getId();
        });
    }
}

$author1 = new Author(1, "Rowling");
$author2 = new Author(2, "Austen");

$book1 = new Book("Harry Potter and The Goblet of Fire", $author1->getId(), true);
$book2 = new Book("Harry Potter and the Chamber of Secrets", $author1->getId(), false);
$book3 = new Book("Pride and Prejudice", $author2->getId(), true);

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

echo "Available Books: ";
print_r($library->getAvailableBooks());

echo "Books by Rowling: ";
print_r($library->getBooksByAuthor($author1));

echo "Find book by title 'Pride and Prejudice': ";
print_r($library->getBookByTitle("Pride and Prejudice"));

?>
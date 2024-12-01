<?php

class Book {
    private int $id;
    private string $title;
    private int $author_id;
    private bool $is_available;

    public function __construct(int $id, string $title, int $author_id, bool $is_available = true) {
        $this->id = $id;
        $this->title = $title;
        $this->author_id = $author_id;
        $this->is_available = $is_available;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthorId(): int {
        return $this->author_id;
    }

    public function isAvailable(): bool {
        return $this->is_available;
    }

    public function setAvailability(bool $is_available): void {
        $this->is_available = $is_available;
    }
}

class Author {
    private int $id;
    private string $last_name;

    public function __construct(int $id, string $last_name) {
        $this->id = $id;
        $this->last_name = $last_name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getLastName(): string {
        return $this->last_name;
    }
}

class Library {
    /** @var array<int, Book> $books Array of books, keyed by their unique IDs */
    private array $books = [];

    public function addBook(Book $book): void {
        $this->books[$book->getId()] = $book;
    }

    public function removeBook(Book $book): void {
        unset($this->books[$book->getId()]);
    }

    public function getBooks(): array {
        return $this->books;
    }

    public function getAvailableBooks(): array {
        return array_filter($this->books, fn(Book $book) => $book->isAvailable());
    }

    public function getBookByTitle(string $title): ?Book {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }

    public function getBooksByAuthor(Author $author): array {
        return array_filter($this->books, fn(Book $book) => $book->getAuthorId() === $author->getId());
    }
}

$author1 = new Author(1, "Rowling");
$author2 = new Author(2, "Austen");

$book1 = new Book(1, "Harry Potter and The Goblet of Fire", $author1->getId(), true);
$book2 = new Book(2, "Harry Potter and the Chamber of Secrets", $author1->getId(), false);
$book3 = new Book(3, "Pride and Prejudice", $author2->getId(), true);

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
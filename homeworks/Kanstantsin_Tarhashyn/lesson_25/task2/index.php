<?php
require_once 'Book.php';
require_once 'Author.php';
require_once 'Library.php';

$author1 = new Author(1, "Greene");
$author2 = new Author(2, "Rolling");
$author3 = new Author(3, "Tolkien");

$book1 = new Book("The Laws of Human Nature", 1, true, 1);
$book2 = new Book("Harry Potter 1", 2, false, 2);
$book3 = new Book("Harry Potter 2", 2, true, 3);
$book4 = new Book("The Lord of the Rings", 3, true, 4);

$library = new Library();
$library->addBook($book1);
$library->addBook($book4);
$library->addBook($book2);
$library->addBook($book3);
print_r($library->getBooks());

$library->removeBook($book2->getId());
print_r($library->getBooks());

$library->removeBook($book3->getId());
print_r($library->getBooks());

print_r($library->getAvailableBooks());

$foundBook = $library->getBookByTitle("Harry Potter 2");
echo $foundBook ? "The book is found: " . $foundBook->getTitle() . "\n" : "The book is not found.\n";

$authorBooks = $library->getBooksByAuthor($author2);
echo "The books of " . $author2->getLastName() . ":\n";
foreach ($authorBooks as $book) {
    echo $book->getTitle() . "\n";
}
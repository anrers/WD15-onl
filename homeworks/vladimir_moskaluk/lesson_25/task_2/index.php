<?php

require_once __DIR__ . '/src/Author.php';
require_once __DIR__ . '/src/Book.php';
require_once __DIR__ . '/src/Library.php';

use App\Task2\Author;
use App\Task2\Book;
use App\Task2\Library;

$author = new Author(1, 'Rowling');
$book1 = new Book(1, 'Harry Potter', $author->getId(), true);
$book2 = new Book(2, 'Fantastic Beasts', $author->getId(), false);

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);

$availableBooks = $library->getAvailableBooks();
$booksByRowling = $library->getBooksByAuthor($author->getId());

echo 'Available Books: ' . count($availableBooks) . PHP_EOL;
echo 'Books by ' . $author->getLastName() . ': ' . count($booksByRowling) . PHP_EOL;

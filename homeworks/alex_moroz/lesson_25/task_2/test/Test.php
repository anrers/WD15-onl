<?php

spl_autoload_register(function ($class_name) {
    require_once '../src/classes/' . $class_name . '.php';
});

use Libraries\Author;
use Libraries\Book;
use Libraries\Library;

$author_1 = new Author(1, 'Corelli');
$author_2 = new Author(2, 'Keyes');
$author_3 = new Author(3, 'McEwan');

$book_1 = new Book('The Sorrows of Satan', $author_1->getId(), true);
$book_2 = new Book('Flowers for Algernon', $author_2->getId(), true);
$book_3 = new Book('The Minds of Billy Milligan', $author_2->getId(), false);
$book_4 = new Book('Atonement', $author_3->getId(), true);
$library = new Library();

assert(0 == count($library->getBooks()));

$library->addBook($book_1);
$library->addBook($book_2);
$library->addBook($book_3);

assert(3 == count($library->getBooks()));

$library->removeBook($book_2);
assert(2 == count($library->getBooks()));

$library->removeBook($book_4);
assert(2 == count($library->getBooks()));

$library->addBook($book_2);
$library->addBook($book_4);
assert(4 == count($library->getBooks()));

assert(3 == count($library->getAvailableBooks()));

assert($book_4 == current($library->getBookByTitle('Atonement')));

assert([$book_3, $book_2] == array_values($library->getBooksByAuthor($author_2)));


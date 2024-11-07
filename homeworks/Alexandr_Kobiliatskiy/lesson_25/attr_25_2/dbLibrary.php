<?php
require_once 'Book.php';
require_once 'Author.php';

$books = [
    new Book(1, "Герой нашего времени", 1, 1),
    new Book(2, "Демон", 1, 1),
    new Book(3, "Война и мир", 2, 0),
    new Book(4, "Воскресенье", 2, 1),
    new Book(5, "Евгений Онегин", 3, 1),
    new Book(6, "Сказка о царе Салтане", 3, 0),
];


$authors = [
    new Author(1, 'Михаил Юрьевич Лермонтов'),
    new Author(2, 'Лев Николаевич Толстой'),
    new Author(3, 'Александр Сергеевич Пушкин'),
];
<?php
require_once 'Book.php';
require_once 'Author.php';

$books = [
   1 => new Book(1, "Герой нашего времени", 1, 1),
   2 => new Book(2, "Демон", 1, 1),
   3 => new Book(3, "Война и мир", 2, 0),
   4 => new Book(4, "Воскресенье", 2, 1),
   5 => new Book(5, "Евгений Онегин", 3, 1),
   6 => new Book(6, "Сказка о царе Салтане", 3, 0),
];


$authors = [
    1 => new Author(1, 'Михаил Юрьевич Лермонтов'),
    2 => new Author(2, 'Лев Николаевич Толстой'),
    3 => new Author(3, 'Александр Сергеевич Пушкин'),
];
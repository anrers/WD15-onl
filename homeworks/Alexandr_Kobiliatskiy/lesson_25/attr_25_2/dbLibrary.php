<?php
require_once 'C:\OSPanel\home\homework-25\attr_25_2\Book.php';
require_once 'C:\OSPanel\home\homework-25\attr_25_2\Author.php';

$boocs = [
    new Book(1, "Герой нашего времени", 1, 1),
    new Book(2, "Демон", 1, 1),
    new Book(3, "Война и мир", 2, 0),
    new Book(4, "Воскресенье", 2, 1),
    new Book(5, "Евгений Онегин", 3, 1),
    new Book(6, "Сказка о царе Салтане", 3, 0),
];


$autors = [
    new Author(1, 'Михаил Юрьевич Лермонтов'),
    new Author(2, 'Лев Николаевич Толстой'),
    new Author(3, 'Александр Сергеевич Пушкин'),
];
<?php
require_once 'User.php';

$conn = new PDO('mysql:host=mysql-5.7;dbname=study', 'root', '');

$tatya = new User('Elena', 'lena@mail.ru', $conn);

$tatya->create();
$tatya->read();

var_dump($tatya->objectId);
$tatya->read();

$tatya->update('Fekla', 'fekla@mail.ru');
$tatya->read();

$tatya->delete();
$tatya->read();







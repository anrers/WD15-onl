<?php
require_once 'User.php';

$conn = new PDO('mysql:host=mysql-5.7;dbname=study', 'root', '');

$elena = new User('Elena', 'lena@mail.ru', $conn);


$elena->create();
$elena->read();

var_dump($elena->objectId);
$elena->read();

$elena->update('Fekla', 'fekla@mail.ru');
$elena->read();

$elena->delete();
$elena->read();







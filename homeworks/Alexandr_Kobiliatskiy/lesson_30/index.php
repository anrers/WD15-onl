<?php
require_once 'User.php';

$conn = new PDO('mysql:host=mysql-5.7;dbname=study', 'root', '');

$user = new User('Egor45', 'egor45@mail.ru', $conn);


$user->create();
var_dump($user->read());
echo '<br>';
var_dump($user->objectId);
echo '<br>';
$user->update('Fekla', 'fekla@mail.ru');
var_dump($user->read());
echo '<br>';
$user->delete();
var_dump($user->read());







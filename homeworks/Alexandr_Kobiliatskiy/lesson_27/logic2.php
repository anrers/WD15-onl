<?php
//Часть задания которая после добавления пользователя из формы
$connection = new mysqli (
    hostname: 'mysql-8.2',
    username: 'root',
    password: '',
    database: 'study'
);

$selectUser = "SELECT name FROM users WHERE id=3";
$resultSelectUser = $connection->query($selectUser);

$changeUsedata = "UPDATE users SET name='Semen', age=20, email='semen@mail.ru' WHERE id=2";
$resultchangeUsedata = $connection->query($changeUsedata);

$deleteUser = "DELETE FROM users WHERE id=8";
$resultDeleteUser = $connection->query($deleteUser);

$connection->close();
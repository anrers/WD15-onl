<?php
$connection = new mysqli (
    hostname: 'mysql-5.7',
    username: 'root',
    password: '',
    database: 'for_lesson_29'
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

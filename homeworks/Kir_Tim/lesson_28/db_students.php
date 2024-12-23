<?php

require_once 'db_enrollments.php';

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        NAME VARCHAR(20) NOT NULL,
        EMAIL VARCHAR(100) NOT NULL
    )
");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    saveData($name, $email);

}

function saveData($name, $email): void
{
    global $connection;
    $connection->query(("
        INSERT INTO students (NAME, EMAIL)
            VALUES ('$name', '$email')
    "));


}

function getStudents(): array
{
    global $connection;
    $result = $connection->query("
        SELECT * FROM users
    ");
    return $result->fetch_all(MYSQLI_ASSOC);
}




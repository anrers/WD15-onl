<?php

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    addStudentToDb($name, $email);
}

function addStudentToDb(string $name, string $email)
{
    global $connection;
    $connection->query("INSERT INTO students (name, email) VALUES ('$name', '$email')");

    echo "Student added successfully!";
}

function getStudents()
{
    global $connection;
    $result = $connection->query("SELECT * FROM students");

    return $result->fetch_all(MYSQLI_ASSOC);
}

$connection->close();
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
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (studentExists($name, $email)) {
        echo "Student with this email or name already exists. No action taken.\n";
    } else {
        addStudentToDb($name, $email);
    }
}

function studentExists(string $name, string $email)
{
    global $connection;

    $query = $connection->prepare("SELECT COUNT(*) FROM students WHERE name = ? OR email = ?");
    $query->bind_param("ss", $name, $email);
    $query->execute();

    $query->bind_result($count);
    $query->fetch();
    $query->close();

    return $count > 0;
}

function addStudentToDb(string $name, string $email)
{
    global $connection;

    $query = $connection->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
    $query->bind_param("ss", $name, $email);
    $query->execute();
    $query->close();

    echo "Student added successfully!\n";
}

function getStudents()
{
    global $connection;
    $result = $connection->query("SELECT * FROM students");

    return $result->fetch_all(MYSQLI_ASSOC);
}

$connection->close();
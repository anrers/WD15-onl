<?php

require_once 'index.php';
require_once 'db_enrollments.php';

$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study",
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

    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+$/", $email) && 
        preg_match("/^[a-zA-ZА-Яа-яЁё]+$/u", $name)) {
        saveData($name, $email);
        echo "Data saved successfully!";
    } else {
        echo "Invalid input: Please ensure your email is in the correct format and your name contains only letters.";
    }
}

function saveData(string $name, string $email): void
{
    global $connection;
    $stmt = $connection->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
    $stmt->bind_param('ss', $name, $email);
    if ($stmt->execute()) {
        echo "Success! Your data has been saved.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$connection->close();
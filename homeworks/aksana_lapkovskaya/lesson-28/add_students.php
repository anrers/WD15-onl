<?php

$connection = new mysqli("mysql-8.2", "root", "", "study");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (studentExists($name, $email)) {
        echo "Student with this name or email already exists. No action taken.";
    } else {
        addStudentToDb($name, $email);
    }
}

function studentExists(string $name, string $email): bool {
    global $connection;

    $stmt = $connection->prepare("SELECT COUNT(*) FROM students WHERE name = ? OR email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}

function addStudentToDb(string $name, string $email): void {
    global $connection;

    $stmt = $connection->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
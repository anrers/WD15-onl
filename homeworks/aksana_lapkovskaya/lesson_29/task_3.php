<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study"
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$connection->query("
    CREATE TABLE IF NOT EXISTS students (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS teachers (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS classes (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(5) NOT NULL
    )
");

$connection->query("
    CREATE TABLE IF NOT EXISTS lessons (
        teacherID INT NOT NULL,
        studentID INT NOT NULL,
        classID INT NOT NULL,
        PRIMARY KEY (teacherID, studentID, classID),
        FOREIGN KEY (studentID) REFERENCES students(id) ON DELETE CASCADE,
        FOREIGN KEY (teacherID) REFERENCES teachers(id) ON DELETE CASCADE,
        FOREIGN KEY (classID) REFERENCES classes(id) ON DELETE CASCADE
    )
");

echo "Tables created successfully!";
$connection->close();
?>
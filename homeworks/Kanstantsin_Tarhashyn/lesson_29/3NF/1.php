<?php
// Подключение к базе данных
$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        class VARCHAR(50) NOT NULL,
        teacher_id INT,
        FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id) ON DELETE SET NULL
    )",
    "CREATE TABLE IF NOT EXISTS teachers (
        teacher_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    )"
];

foreach ($sqlQueries as $query) {
    if ($connection->query($query) === TRUE) {
        echo "Table created successfully: " . substr($query, 13, strpos($query, "(") - 13) . "<br>";
    } else {
        echo "Error creating table: " . $connection->error . "<br>";
    }
}

$connection->close();
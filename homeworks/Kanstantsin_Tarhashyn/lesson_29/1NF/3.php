<?php
$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS groups (
        group_id INT AUTO_INCREMENT PRIMARY KEY,
        group_name VARCHAR(50) UNIQUE NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        group_id INT,
        date_of_birth DATE,
        address TEXT,
        phone VARCHAR(20),
        email VARCHAR(100) UNIQUE,
        FOREIGN KEY (group_id) REFERENCES groups(group_id) ON DELETE SET NULL
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
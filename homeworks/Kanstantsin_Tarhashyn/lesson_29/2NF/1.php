<?php
$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS books (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        author_id INT,
        genre_id INT,
        publisher_id INT,
        year INT,
        FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE SET NULL,
        FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE SET NULL,
        FOREIGN KEY (publisher_id) REFERENCES publishers(id) ON DELETE SET NULL
    )",
    "CREATE TABLE IF NOT EXISTS authors (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS genres (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    )",
    "CREATE TABLE IF NOT EXISTS publishers (
       id INT AUTO_INCREMENT PRIMARY KEY,
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
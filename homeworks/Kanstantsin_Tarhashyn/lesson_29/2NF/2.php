<?php
$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        client_id INT,
        amount DECIMAL(10, 2),
        FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE
    )",
    "CREATE TABLE IF NOT EXISTS clients (
        client_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        account_number VARCHAR(20),
        bank VARCHAR(255)
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
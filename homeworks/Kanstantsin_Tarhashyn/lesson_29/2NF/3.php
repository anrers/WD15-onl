<?php
$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

$sqlQueries = [
    "CREATE TABLE IF NOT EXISTS sales (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT,
        client_id INT,
        sale_amount DECIMAL(10, 2),
        FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
        FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE
    )",
    "CREATE TABLE IF NOT EXISTS products (
        product_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        description VARCHAR(200)
    )",
    "CREATE TABLE IF NOT EXISTS clients (
        client_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100)
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
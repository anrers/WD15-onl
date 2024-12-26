<?php 

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$sql = "
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    address VARCHAR(250),
    phone VARCHAR(20),
    email VARCHAR(50) UNIQUE
)";

if ($connection->query($sql) === TRUE) {
    echo "Table 'Clients' created successfully.";
} else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
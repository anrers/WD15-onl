<?php

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS users (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        AGE INT,
        EMAIL VARCHAR(100)
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    saveData($name, $age, $email);
}

function saveData(string $name,int $age,string $email): void
{
    global $connection;
    $connection->query(("
        INSERT INTO users (NAME, AGE, EMAIL)
            VALUES ('$name', '$age', '$email')
    "));
}

function getUserById(int $id): array
{
    global $connection;
    $result = $connection->query("
        SELECT * FROM users WHERE ID = $id
    ");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateUser($id, $name, $age, $email): void
{
    global $connection;
    $connection->query("
        UPDATE users SET NAME = '$name', AGE = $age, EMAIL = '$email' WHERE ID = $id
    ");
}

function deleteUserById(int $id): void
{
    global $connection;
    $connection->query("
        DELETE FROM users WHERE ID = $id
    ");
}



<?php

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        age INT NOT NULL,
        email VARCHAR(100) NOT NULL
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    saveData($name, $age, $email);
}

function saveData($name, $age, $email): void 
{
    global $connection;
    $connection->query(("INSERT INTO users (name, age, email) VALUES ('$name', '$age', '$email')"));
}

function getUserById($id) 
{
    global $connection;
    $result = $connection->query("SELECT * FROM users WHERE id = $id");
    return $result->fetch_assoc();
}

function updateUser($id, $name, $age, $email): void 
{
    global $connection;
    $connection->query("UPDATE users SET name = $name, age = $age, email = $email WHERE id = $id");
}

function deleteUserById($id): void 
{
    global $connection;
    $connection->query("DELETE FROM users WHERE id = $id");
}

$connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 27</title>
</head>
<body>
    <form method="post">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required>

        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
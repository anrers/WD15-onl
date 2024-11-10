<?php

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

var_dump($connection->ping());

echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

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

    addUserToDb($name, $age, $email);
}

function addUserToDb(string $name, int $age, string $email) 
{
    global $connection;
    $connection->query("INSERT INTO users (name, age, email) VALUES ('$name', '$age', '$email')");
}

function getUserById($id)
{
    global $connection;
    $result = $connection->query("SELECT * FROM users WHERE id = $id");
    return $result->fetch_assoc();
}

function updateUser($id, $name, $age, $email)
{
    global $connection;

    $result = $connection->prepare("UPDATE users SET name = ?, age = ?, email = ? WHERE id = ?");
    $result->bind_param("sisi", $name, $age, $email, $id);

    $result->execute();
    $result->close();
}

function deleteUserById($id)
{
    global $connection;
    $connection->query("DELETE FROM users WHERE id = $id");
}

$connection->close();




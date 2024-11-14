<?php 
session_start();
require_once 'db-connection.php';
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
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
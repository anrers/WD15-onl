<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study");

$connection->query("CREATE TABLE if not exists students(
        id INT PRIMARY KEY auto_increment,
        name VARCHAR(50) not null,
        email VARCHAR(50) UNIQUE not null 
)");

if ((isset($_POST["name"])) && isset($_POST["email"])) {
    global $connection;
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (preg_match("#^[a-zA-Z]{1,15}$#", $name) && preg_match("#^(\w+)@[a-z]{3,5}.[a-z]{2,3}$#",
            $email)) {
        $addInfo = $connection->prepare("INSERT INTO students(name, email) VALUES(?,?)");
        $addInfo->bind_param("ss", $name, $email);
        $addInfo->execute();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css">
    <title>Homework 27</title>
</head>
<body>
<div>
    <form class="studentForm" method="post" action="">
        <label> Write your name:
            <input type="text" name="name" pattern="^[a-zA-Z]{1,15}$" required>
        </label>
        <label> Write your email:
            <input type="email" name="email" pattern="^(\w+)@[a-z]{3,5}.[a-z]{2,3}$" required>
        </label>
        <input type="submit">
    </form>
</div>
</body>
</html>
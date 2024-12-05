<?php
session_start();
require_once 'db_students.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Форма</h1>
<form action="db_students.php" method="post">
    <div>
        <label for="name">Имя:</label>
        <input name="name" id="name">
    </div>
    <br>
    <div>
        <label for="email">Email:</label>
        <input name="email" id="email">
    </div>
    <br>
    <input type="submit" value="Отправить" name="submit">
    <input type="hidden" name="type" value="feedback">
    <br>
</form>
</body>
</html>

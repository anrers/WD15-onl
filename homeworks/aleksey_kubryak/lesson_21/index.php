<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];

    $data = "$name, $surname, $email" . PHP_EOL;

    if (file_put_contents(__DIR__ . "/data.txt", $data, FILE_APPEND) !== false) {
        echo "Данные успешно записаны";
    } else {
        echo "Ошибка записи данных";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
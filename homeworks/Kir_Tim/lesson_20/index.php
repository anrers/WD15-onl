<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>20</title>
</head>
<body>
    <form action="register.php" method="post">
        <div>
            <label for="firstName">Имя:</label><br>
            <input type="text" id="firstName" name="firstName" value=""
                   pattern="[A-Za-z\s]+">
        </div><br>
        <div>
            <label for="lastName">Фамилия:</label><br>
            <input type="text" id="lastName" name="lastName" value=""
                   pattern="[A-Za-z\s]+">
        </div><br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value=""
                   pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)">
        </div><br>
        <div>
            <label for="formApproval">Согласен на обработку данных</label>
            <input name="formApproval" type="checkbox" value="1" required>
        </div><br>
        <button type="submit">Регистрация</button>
    </form>
</body>
</html>
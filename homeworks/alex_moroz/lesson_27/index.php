<?php
session_start();
require_once 'bootstrap.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HW 27</title>
</head>
<body>
<h2>Сохранить пользователя</h2>
<form action="action/createUser.php" method="post">
    <div>
        <label for="name">Имя:</label>
        <input name="name" id="name" type="text"
               required
               minlength="2"
               maxlength="20"
               pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
               title="Введите от 2 до 20 букв.">
    </div>
    <div>
        <label for="email">Email:</label>
        <input name="email" id="email" type="email"
               required
               minlength="7"
               maxlength="30"
               pattern="^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$"
               title="Введите email">
    </div>
    <div>
        <label for="age">Возраст:</label>
        <input name="age" id="age" type="number"
               required
               max="120"
               min="5"
               title="Возраст д.б. от 5 до 120 лет">
    </div>
    <button name="save" type="submit">Сохранить пользователя</button>
</form>

<h2>Найти пользователя по id</h2>
<form action="action/findUser.php" method="post">
    <div>
        <label for="id">Id:</label>
        <input name="id" id="id" type="number">
    </div>
    <button name="find" type="submit">Найти</button>
</form>
<div style="margin-bottom: 20px">
    <?php
    if (isset($_SESSION['user'])) {
        echo "<pre>";
        print_r($_SESSION['user']);
        echo "</pre>";
    }

    if (isset($_SESSION['isFound']) && !$_SESSION['isFound']) {
        echo 'Пользователь не найден.';
    }

    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if(isset($_SESSION['isFound'])) {
        unset($_SESSION['isFound']);
    }
    ?>
</div>

<h2>Update Users</h2>
<table>
    <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Возраст</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($userService->getAllUsers() as $row) { ?>
        <tr>
            <form action='action/updateUser.php' method='post'>
                <td><input type="text" name='name' value='<?= $row["name"] ?>'
                           required
                           minlength="2"
                           maxlength="20"
                           pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
                           title="Введите от 2 до 20 букв."></td>
                <td><input type="email" name='email' value='<?= $row["email"] ?>'
                           required
                           minlength="7"
                           maxlength="30"
                           pattern="^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$"
                           title="Введите email"></td>
                <td><input type="number" name='age' value='<?= $row["age"] ?>'
                           required
                           max="120"
                           min="5"
                           title="Возраст д.б. от 5 до 120 лет"></td>
                <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
                <td>
                    <button name="update" type="submit">Обновить</button>
                <td>
            </form>
            <form action='action/removeUser.php' method='post'>
                <input type='hidden' name='id' value='<?= $row["id"] ?>'/>
                <td>
                    <button name="remove" type="submit">Удалить</button>
                </td>
            </form>
        </tr>
        <?php
    } ?>
</table>
</body>
</html>



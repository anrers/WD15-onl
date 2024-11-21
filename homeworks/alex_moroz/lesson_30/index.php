<?php

require_once 'bootstrap.php';

/**
 * @var $userService {@link \Service\User\UserServiceImpl}
 */

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HW 30</title>
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
    <div>
        <label for="gender">Пол:</label>
        <input type="radio" name="gender" id="gender" value="1" checked="checked">Мужской
        <input type="radio" name="gender" id="gender" value="2"/>Женский
    </div>
    <button name="save" type="submit">Сохранить пользователя</button>
</form>

<h2>Найти пользователя по email</h2>
<form action="action/findUser.php" method="post">
    <div>
        <label for="email">Email:</label>
        <input name="email" id="email">
    </div>
    <button name="find" type="submit">Найти</button>
</form>
<div style="margin-bottom: 20px">
    <?php
    if (isset($_SESSION['user'])) {
        echo $_SESSION["user"];
    }

    if (isset($_SESSION['isFound']) && !$_SESSION['isFound']) {
        echo 'Пользователь не найден.';
    }

    if (isset($_SESSION['searchError'])) {
        echo $_SESSION["searchError"];
    }

    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    if (isset($_SESSION['isFound'])) {
        unset($_SESSION['isFound']);
    }
    if (isset($_SESSION['searchError'])) {
        unset($_SESSION['searchError']);
    }
    ?>
</div>

<h2>Update Users</h2>
<table>
    <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Возраст</th>
        <th>Пол</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php
    try {
    foreach ($userService->getAllUsers() as $user) { ?>
        <tr>
            <form action='action/updateUser.php' method='post'>
                <td><input type="text" name='name' value='<?= $user->getName() ?>'
                           required
                           minlength="2"
                           maxlength="20"
                           pattern="^[а-яА-ЯёЁA-Za-z]{2,20}$"
                           title="Введите от 2 до 20 букв."></td>
                <td><input type="email" name='email' value='<?= $user->getEmail() ?>'
                           required
                           minlength="7"
                           maxlength="30"
                           pattern="^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$"
                           title="Введите email"></td>
                <td><input type="number" name='age' value='<?= $user->getAge() ?>'
                           required
                           max="120"
                           min="5"
                           title="Возраст д.б. от 5 до 120 лет"></td>
                <td><input type="radio" name="gender" value="1"
                        <?php
                        if ($user->getGenderId() == 1) { ?>
                            checked="checked"
                            <?php
                        } ?>
                    />Мужской
                    <input type="radio" name="gender" value="2"
                        <?php
                        if ($user->getGenderId() == 2) { ?>
                            checked="checked"
                            <?php
                        } ?> />Женский
                </td>
                <input type='hidden' name='id' value='<?= $user->getId() ?>'/>
                <td>
                    <button name="update" type="submit">Обновить</button>
                <td>
            </form>
            <form action='action/removeUser.php' method='post'>
                <input type='hidden' name='id' value='<?= $user->getId() ?>'/>
                <td>
                    <button name="remove" type="submit">Удалить</button>
                </td>
            </form>
            <td>
                <?php
                if (isset($_SESSION['deleteError'])) {
                    echo $_SESSION["deleteError"];
                    unset($_SESSION['deleteError']);
                } ?>
            </td>
        </tr>
        <?php
    }
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }?>
</table>
</body>
</html>



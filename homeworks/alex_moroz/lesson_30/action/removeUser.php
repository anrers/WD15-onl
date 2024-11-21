<?php
require_once '../bootstrap.php';

/**
 * @var $userService {@link \Service\User\UserServiceImpl}
 */

if (isset($_POST["id"])) {
    try {
        $userService->remove($_POST["id"]);
    } catch (Exception $exception) {
        echo $exception->getMessage(); //логирование ошибки
        $_SESSION["deleteError"] = "Ошибка при удалении пользователя с id = {$_POST["id"]}";
    }
}
header("Location: ../index.php");

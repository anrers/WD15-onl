<?php
require_once '../bootstrap.php';
require_once 'validateUserData.php';

/**
 * @var $userService {@link \Service\User\UserServiceImpl}
 */

if (isset($_POST["email"])) {
    try {
        $user = $userService->getUserByEmail($_POST["email"]);
        $_SESSION["user"] = $user;
        if (!$user) {
            $_SESSION["isFound"] = false;
        }
    } catch (Exception $exception) {
        echo $exception->getMessage(); //логирование ошибки
        $_SESSION["searchError"] = "Ошибка при поиске пользователя с email = {$_POST["email"]}";
    }
}
header("Location: ../index.php");
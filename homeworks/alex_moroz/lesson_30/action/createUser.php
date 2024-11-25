<?php
require_once '../bootstrap.php';
require_once 'validateUserData.php';

/**
 * @var $userService {@link \Service\User\UserServiceImpl}
 */

$errors = validateUserData();
if (empty($errors)) {
    try {
        $userService->save($_POST["name"], $_POST["age"], $_POST["email"], $_POST["gender"]);
        header("Location: ../index.php");
        return;
    } catch (Exception $exception) {
        echo $exception->getMessage(); //логирование ошибки
        $errors[] = "Невозможно сохранить пользователя с email = {" . $_POST["email"] . "}";
    }
}

foreach ($errors as $error) {
    echo "<p style='color: red;'>$error</p>";
}
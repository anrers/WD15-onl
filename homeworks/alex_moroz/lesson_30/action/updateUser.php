<?php

require_once '../bootstrap.php';
require_once 'validateUserData.php';

/**
 * @var $userService {@link \Service\User\UserServiceImpl}
 */

if (isset($_POST["id"])) {
    $errors = validateUserData();
    if (empty($errors)) {
        try {
            $userService->update([
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "age" => $_POST["age"],
                "gender" => $_POST["gender"],
                "id" => $_POST["id"],
            ]);
            header("Location: ../index.php");
            return;
        } catch (Exception $e) {
            $errors[] = "Пользователь не обновлен. Ошибка: " . $e->getMessage();
        }
    }

    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}
<?php

require_once '../bootstrap.php';

if (isset($_POST["id"])) {
    $errors = validateUserData();
    if (empty($errors)) {
        $changedFields = 'name = "' . $_POST["name"] . '", age = ' . $_POST["age"] . ', email = "' . $_POST["email"] . '"';
        $result = $userService->update(['id' => $_POST["id"], 'changedFields' => $changedFields]);
        header("Location: ../index.php");
        return;
    }

    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}
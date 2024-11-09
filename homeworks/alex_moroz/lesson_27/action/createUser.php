<?php
session_start();
require_once '../bootstrap.php';
require_once 'validateUserData.php';

$errors = validateUserData();
if (empty($errors)) {
    $result = $userService->save($_POST["name"], $_POST["age"], $_POST["email"]);
    header("Location: ../index.php");
    return;
}

foreach ($errors as $error) {
    echo "<p style='color: red;'>$error</p>";
}
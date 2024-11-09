<?php
session_start();
require_once '../bootstrap.php';
require_once 'validateUserData.php';

if (isset($_POST["id"])) {
    $result = $userService->getUserById($_POST["id"]);
    if ($result == null){
        $_SESSION["isFound"] = false;
    }
    $_SESSION["user"] = $result;
}
header("Location: ../index.php");
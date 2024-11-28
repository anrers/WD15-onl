<?php

require_once '../vendor/autoload.php';
session_start();

header("Location: ../index.php");

if (empty($_POST["passwordLength"])) {
    $_SESSION["password"] = generatePassword();
    return;
}


if ($_POST["passwordLength"] >= 5 && $_POST["passwordLength"] <= 20) {
    $_SESSION["password"] = generatePassword($_POST["passwordLength"]);
    unset($_POST["passwordLength"]);
    return;
}


$_SESSION["error"] = "Can't generate password for given length {" . $_POST["passwordLength"] . "}: must be between 5 and 20 characters long";
unset($_POST["passwordLength"]);
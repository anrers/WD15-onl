<?php

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"]) || !preg_match("/^[a-zA-ZА-Яа-яЁё]+$/u", $_POST["name"])) {
        $errors[] = "Enter name";
    }
    
    if (empty($_POST["surname"]) || !preg_match("/^[a-zA-ZА-Яа-яЁё]+$/u", $_POST["surname"])) {
        $errors[] = "Enter surname";
    }

    if (empty($_POST["email"]) || !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+$/", $_POST["email"])) {
        $errors[] = "Enter your e-mail address";
    }

    if (empty($_POST["consent"])) {
        $errors[] = "Consent to data processing is required";
    }

    if (empty($errors)) {
        echo "Регистрация успешна!<br>";
        echo "Имя: $name<br>";
        echo "Фамилия: $surname<br>";
        echo "Электронная почта: $email<br>";
    } else {
        echo "Ошибки регистрации:<br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
}
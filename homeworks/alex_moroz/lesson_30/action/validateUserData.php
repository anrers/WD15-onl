<?php
function validateUserData(): array
{
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');

    $errors = [];

    if ((empty($name) || strlen($name) < 2 || strlen($name) > 20) || !preg_match("#^[а-яА-ЯёЁA-Za-z]{2,20}$#", $name)) {
        $errors[] = "Поле 'имя' должно содержать от 2 до 20 буквенных символов";
    }

    if ((empty($email) || strlen($email) < 7 || strlen($name) > 30) || !preg_match("#^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z]+@[a-zA-Z]+\\.[a-zA-Z]{2,6}$#", $email)) {
        $errors[] = "Поле 'email' должно содержать от 7 до 30 символов и должно соответствовать шаблону";
    }

    if (empty($age) || $age < 5 || $age > 120) {
        $errors[] = "Возраст должен быть от 5 до 120 лет";
    }

    if (empty($gender) || $gender < 1 || $gender > 2) {
        $errors[] = "Необходимо выбрать пол.";
    }

    return $errors;
}
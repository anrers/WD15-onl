<?php
//Написать функцию, которая будет проверять пароль. Правила:
//1. Содержит от 8 до 16 символов - done
//2. Содержит буквы и цифры - done
//4. Содержит минимум 2 символа из набора символов ?:%!()*+=_
//3. Имеет минимум 1 заглавную букву
//4. Не содержит пробелов
function passwordCheck(string $password)
{
    if (strlen($password) < 8 || strlen($password) > 16) {
        return 'Пароль должен содержать 8 до 16 символов';
    }

    if (!preg_match("#[a-zA-Z]+#", $password) || !preg_match("#\d+#", $password)) {
        return 'Пароль должен содержать буквы и цифры';
    }

    if (!preg_match("#[?:%!()*+=_]{2,}#", $password)) {
        return 'Пароль должен содержать минимум 2 спецсимвола';
    }

    if (!preg_match("#[A-Z]#", $password)) {
        return 'Пароль должен содержать минимум 1 заглавную букву';
    }

    if (preg_match("#\s#", $password)) {
        return "Пароль не должен содержать пробелы";
    }
    return 'Пароль прошел проверку';
}

$password = "Afd12gassword**";
echo passwordCheck($password) . PHP_EOL; // Прошел проверку
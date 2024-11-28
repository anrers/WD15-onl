<?php

declare(strict_types=1);

/**
 * Генерирует случайный пароль заданной длины.
 *
 * @param int $length Длина пароля.
 * @return string Случайно сгенерированный пароль.
 */
function generatePassword(int $length): string
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charactersLength - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

$password = generatePassword(8);
echo $password;

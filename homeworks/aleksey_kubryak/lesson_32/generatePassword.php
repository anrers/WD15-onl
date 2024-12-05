<?php

function generatePassword(int $length): string
{
    if ($length < 3) {
        echo "Длина пароля должна быть не менее 3 символов";
    }

    $lower = 'abcdefghijklmnopqrstuvwxyz';
    $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';

    $password = $lower[random_int(0, strlen($lower) - 1)] .
                $upper[random_int(0, strlen($upper) - 1)] .
                $digits[random_int(0, strlen($digits) - 1)];

    $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $symbolsLength = strlen($symbols);

    for ($i = 3; $i < $length; $i++) {
        $randomIndex = random_int(0, $symbolsLength - 1);
        $password .= $symbols[$randomIndex];
    }

    return str_shuffle($password);
}
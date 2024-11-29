<?php

function generatePassword(int $length): string
{
    if ($length < 4) {
        return false;
    }

    $uppercase = range('A', 'Z');
    $lowercase = range('a', 'z');
    $number = range(0, 9);
    $special = range('!', '@');
    $allowedSymbols = array_merge($uppercase, $lowercase, $number);
    $password = [];

    while (count($password) < ($length - 1)) {
        $password[] = $allowedSymbols[array_rand($allowedSymbols, 1)];
    }

    $password[] = $special[array_rand($special, 1)];

    shuffle($password);

    return implode('', $password);
}

print_r(generatePassword(5));

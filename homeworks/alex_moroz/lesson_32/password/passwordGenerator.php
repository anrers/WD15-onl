<?php

function generatePassword(int $length = 8): string
{
    $password = '';
    $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $limit = strlen($allowedCharacters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $allowedCharacters[rand(0, $limit)];
    }
    return $password;
}
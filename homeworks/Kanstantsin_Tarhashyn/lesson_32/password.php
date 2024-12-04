<?php

function generatePassword($length)
{
    $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';

    $allChars = $lowerCase . $uppercase . $numbers;
    
    $password = '';

    $totalChars = strlen($allChars);

    for ($i= 0; $i < $length; $i++) {
        $randomIndex = random_int(0, $totalChars - 1);
        $password .= $allChars[$randomIndex];
    }

    return $password;
}

$password = generatePassword(20);
echo $password;
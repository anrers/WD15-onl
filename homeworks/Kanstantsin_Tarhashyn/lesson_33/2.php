<?php

function calculateDigitSum($number) {
    $digits = str_split(abs($number));

    $sum = 0;

    foreach ($digits as $digit) {
        $sum += (int)$digit;
    }

    return $sum;
}


$number = 19945;
$result = calculateDigitSum($number);
echo $result; 
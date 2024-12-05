<?php

function calculateDigitSum(int $number): int 
{
    $digitsArray = str_split((string)$number);
    $sum = 0;

    foreach ($digitsArray as $digit) {
        $sum += (int)$digit;
    }

    return $sum;
}

$number = 12345;
$result = calculateDigitSum($number);
echo $result;
<?php

declare(strict_types=1);

namespace App\Utils;

class DigitSumCalculator
{
    public static function calculateDigitSum(int $number): int
    {
        $sum = 0;
        foreach (str_split((string)abs($number)) as $digit) {
            $sum += (int)$digit;
        }
        return $sum;
    }
}

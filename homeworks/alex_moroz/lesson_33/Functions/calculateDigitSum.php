<?php

function calculateDigitSum(int $number): int
{
    return array_sum(str_split(abs($number)));
}
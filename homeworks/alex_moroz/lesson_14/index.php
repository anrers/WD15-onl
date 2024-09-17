<?php

/**
 * Calculate sum of two numbers.
 * Note! automatic converting to integer|float:
 * Float is converting to int then to other types (description below). Note: NaN, Inf and -Inf will always be zero when cast to int.
 * Bool: false will yield 0 (zero), and true will yield 1 (one).
 * Float: the number will be rounded towards zero.
 * String: if the string is numeric or leading numeric then it will resolve to the corresponding integer value, otherwise it is converted to zero (0).
 * NULL : is always converted to zero (0).
 *
 * @param int|float $firstNumber first number to add
 * @param int|float $secondNumber second number to add
 * @return int|float total sum of given arguments
 */
function sum(int|float $firstNumber, int|float $secondNumber): int|float
{
    return $firstNumber + $secondNumber;
}

/**
 * Get length of given stroke.
 * NOTE: String conversion is automatically done in the scope of an expression where a string is needed.
 * A bool true value is converted to the string "1". bool false is converted to "" (the empty string).
 * An int or float is converted to a string representing the number textually (including the exponent part for floats).
 * Floating point numbers can be converted using exponential notation (4.1E+6).
 * Arrays are always converted to the string "Array". To view a single element, use a construction such as echo $array['key'].
 * null is always converted to an empty string.
 *
 * @param string $stroke stroke
 * @return int length of given stroke
 */
function getStrokeLength(string $stroke): int
{
    return mb_strlen($stroke);
}

/**
 * Get arithmetic mean of given array.
 * NOTE: method also will work with a numeric string.
 *
 * @param array $array array
 * @return int|float arithmetic mean of given array if numbers can be cast to numeric and given array is not empty, otherwise - 0
 */
function getArrayArithmeticMean(array $array): int|float
{
    $numericArray = array_filter($array,  fn($item) => is_numeric($item));

    if (!is_array($array) || !$array || $array !== $numericArray) {
        return 0;
    }
    return array_sum($array) / count($array);
}

/**
 * Select number with max value between two.
 * Note! automatic converting to integer|float:
 * Float is converting to int then to other types (description below). Note: NaN, Inf and -Inf will always be zero when cast to int.
 * Bool: false will yield 0 (zero), and true will yield 1 (one).
 * Float: the number will be rounded towards zero.
 * String: if the string is numeric or leading numeric then it will resolve to the corresponding integer value, otherwise it is converted to zero (0).
 * NULL : is always converted to zero (0).
 *
 * @param int|float $firstNumber first number
 * @param int|float $secondNumber second number
 * @return mixed max number
 */
function getMaxValue(int|float $firstNumber, int|float $secondNumber): mixed
{
    return max($firstNumber, $secondNumber);
}

/**
 * Get concat value.
 * NOTE: String conversion is automatically done in the scope of an expression where a string is needed.
 * A bool true value is converted to the string "1". bool false is converted to "" (the empty string).
 * An int or float is converted to a string representing the number textually (including the exponent part for floats).
 * Floating point numbers can be converted using exponential notation (4.1E+6).
 * Arrays are always converted to the string "Array". To view a single element, use a construction such as echo $array['key'].
 * null is always converted to an empty string.
 *
 * @param string $firstStroke first stroke
 * @param string $secondStroke second stroke
 * @return string concat stroke
 */
function concatValues(string $firstStroke, string $secondStroke): string
{
    return $firstStroke . $secondStroke;
}

/**
 * Get given stroke in upper case.
 * NOTE: String conversion is automatically done in the scope of an expression where a string is needed.
 * A bool true value is converted to the string "1". bool false is converted to "" (the empty string).
 * An int or float is converted to a string representing the number textually (including the exponent part for floats).
 * Floating point numbers can be converted using exponential notation (4.1E+6).
 * Arrays are always converted to the string "Array". To view a single element, use a construction such as echo $array['key'].
 * null is always converted to an empty string.
 *
 * @param string $stroke stroke
 * @return string given stroke in upper case
 */
function getUpperCaseStroke(string $stroke): string
{
    return mb_strtoupper($stroke);
}

/**
 * Check, does given stroke contains subStroke.
 * NOTE: String conversion is automatically done in the scope of an expression where a string is needed.
 * A bool true value is converted to the string "1". bool false is converted to "" (the empty string).
 * An int or float is converted to a string representing the number textually (including the exponent part for floats).
 * Floating point numbers can be converted using exponential notation (4.1E+6).
 * Arrays are always converted to the string "Array". To view a single element, use a construction such as echo $array['key'].
 * null is always converted to an empty string.
 *
 * @param string $stroke stroke
 * @param string $subStroke subStroke
 * @return bool true - if stroke contains subStroke, otherwise - false
 */
function isStrokeContainsSubStroke(string $stroke, string $subStroke): bool
{
    return str_contains($stroke, $subStroke);
}

/**
 * Get arithmetic mean of 2 given numbers.
 * NOTE: method also will work with a numeric string.
 *
 * @param int|float $firstNumber first number
 * @param int|float $secondNumber second number
 * @return int|float arithmetic mean of 2 numbers if given numbers are numeric, otherwise - 0
 */
function getArithmeticMean(int|float $firstNumber, int|float $secondNumber): int|float
{
    return getArrayArithmeticMean([$firstNumber, $secondNumber]);
}

/**
 * Get square root of given number.
 * NOTE: method also will work with a numeric string.
 *
 * @param int|float $number number
 * @return mixed square root
 */
function getNumberSquareRoot(int|float $number): mixed
{
    return is_numeric($number) ? sqrt($number) : "Can't get square root of given value: {$number} can't be cast to number.";
}

/**
 * Sort array in ascending order
 * @param $numbers array to sort
 */
function arraySortASC(&$numbers)
{
    usort($numbers, function ($a, $b) {
        return $a - $b;
    });
}

/**
 * Sort array in descending order
 * @param $numbers array to sort
 */
function arraySortDESC(&$numbers)
{
    usort($numbers, function ($a, $b) {
        return $b - $a;
    });
}
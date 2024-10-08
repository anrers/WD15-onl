<?php
//1. Написать функцию, которая принимает на вход два числа и возвращает их сумму.
function sum($a, $b) {
    return $a + $b;
}

//2. Написать функцию, которая принимает на вход строку и возвращает ее длину.
function getLength($str) {
    return strlen($str);
}

//3. Написать функцию, которая принимает на вход массив чисел и возвращает их среднее значение.
function average($numbers) {
    if (empty($numbers)) {
        return 0;
    }
    return array_sum($numbers) / count($numbers);
}

//4. Написать функцию, которая принимает на вход два числа и определяет, какое из них больше.
function compare($a, $b) {
    if ($a == $b) {
        return "$a равно $b";
    }
    return $a > $b ? "$a больше $b" : "$b больше $a";
}

//5. Написать функцию, которая принимает на вход две строки и возвращает их объединение.
function concat($str1, $str2) {
    return $str1 . $str2;
}

//6. Написать функцию, которая принимает на вход строку и возвращает ее в верхнем регистре.
function toUpperCase($str) {
    return strtoupper($str);
}

//7. Написать функцию, которая принимает на вход строку и определяет, содержит ли она подстроку.
function containsSubstring($str, $substring) {
    return strpos($str, $substring) !== false;
}

//8. Найти среднее арифметическое двух чисел.
function averageOfTwo($a, $b) {
    return ($a + $b) / 2;
}

//9. Найти корень квадратный из числа.
function squareRoot($num) {
    return sqrt($num);
}

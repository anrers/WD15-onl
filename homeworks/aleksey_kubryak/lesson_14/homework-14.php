<?php
// Написать функцию, которая принимает на вход два числа и возвращает их сумму
function summNumbers($firstNum, $secondNum) {
    return $firstNum + $secondNum;
}
echo summNumbers(5, 10) . PHP_EOL;
// Написать функцию, которая принимает на вход строку и возвращает ее длину
function lenStr($str) {
    return strlen($str);
}
echo lenStr('abcd') . PHP_EOL;
// Написать функцию, которая принимает на вход массив чисел и возвращает их среднее значение
function averageVal($arrayNum) {
    if (count($arrayNum) == 0) {
        return 0;
    }
    return array_sum($arrayNum) / count($arrayNum);
}
echo averageVal([2, 4, 5]) . PHP_EOL;
// Написать функцию, которая принимает на вход два числа и определяет, какое из них больше
function maxNum($firstNum, $secondNum) {
    return max($firstNum, $secondNum);
}
echo maxNum(45, 110) . PHP_EOL;
// Написать функцию, которая принимает на вход две строки и возвращает их объединение
function addStr($firstStr, $secondStr) {
    return $firstStr . $secondStr;
}
echo addStr('ab', 'cd') . PHP_EOL;
// Написать функцию, которая принимает на вход строку и возвращает ее в верхнем регистре
function strUpper($str) {
    return strtoupper($str);
}
echo strUpper('abcd') . PHP_EOL;
// Написать функцию, которая принимает на вход строку и определяет, содержит ли она подстроку
function containsSubstring($str, $subStr): bool {
    return str_contains($str, $subStr);
}
var_dump(containsSubstring('hello world', 'word')) . PHP_EOL;
// Найти среднее арифметическое двух чисел
function averageNum($firstNum, $secondNum) {
    return ($firstNum + $secondNum) / 2;
}
echo averageNum(5, 5) . PHP_EOL;
// Найти корень квадратный из числа
function sqrtNum($num) {
    return sqrt($num);
}
echo sqrtNum(169) . PHP_EOL;
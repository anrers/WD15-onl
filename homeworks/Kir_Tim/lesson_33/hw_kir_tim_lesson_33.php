<?php
//Проверка сбалансированности скобок. Напишите функцию на PHP,
// которая принимает строку, содержащую скобки (круглые (), квадратные []
// и фигурные {}), и проверяет, является ли эта строка сбалансированной в
// отношении скобок. Функция должна возвращать true, если скобки
// сбалансированы, и false в противном случае

$string1 = '[({})]';
$string2 = "({[)}]";
function isBalanced($input): void
{
    $replace = str_replace(["}", ")", "]"], ["{rep", "(rep", "[rep"], $input);
//    var_dump($replace);
    $result = preg_replace('/([\[({])(?R)*\1rep/', "", $replace);
//    var_dump($result);

    if (mb_strlen($result) == 0) {
        echo 'Вывод: true' .PHP_EOL;
    } else {
        echo 'Вывод: false' . PHP_EOL;
    }
}

isBalanced($string1);
isBalanced($string2);


//Подсчет суммы цифр числа. Напишите функцию на PHP, которая
// принимает целое число в качестве аргумента и возвращает сумму его
// цифр.
// $number = 12345;
// $result = calculateDigitSum($number);
// echo $result; // Вывод: 15
function calculateDigitSum(int $number): int
{
    return array_sum(str_split($number));
}

$number = 12345789;
$result = calculateDigitSum($number);
echo $result;
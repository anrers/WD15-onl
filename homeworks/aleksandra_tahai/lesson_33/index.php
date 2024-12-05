<?php


//Проверка сбалансированности скобок. Напишите функцию на PHP, которая принимает строку, содержащую скобки (круглые (), квадратные []
//и фигурные {}), и проверяет, является ли эта строка сбалансированной в отношении скобок. Функция должна возвращать true, если скобки
//сбалансированы, и false в противном случае.

$string1 = "(([{()}]))";
$result1 = isBalanced($string1);
echo $result1 . PHP_EOL;
$string2 = "({[)}]";
$result2 = isBalanced($string2);
echo $result2 .PHP_EOL; // Вывод: false

function isBalanced(string $string): bool
{
    $lenght = strlen($string);
    if ($lenght % 2 == 0 and preg_match("#^[(){}\[\]]+$#", $string)) {
        $values = str_split($string);
        $arrayOfBool = [];
        for ($i = 0; $i < count($values) / 2; $i++) {
            $test = $values[$i] . $values[$lenght - 1 - $i];
            $arrayOfBool[] = preg_match("#^((\[\])|({})|(\(\)))$#", $test);
        }
        if (in_array(0, $arrayOfBool)) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


//2. Подсчет суммы цифр числа. Напишите функцию на PHP, которая
//принимает целое число в качестве аргумента и возвращает сумму его цифр.
$number = 123;
$result = calculateDigitSum($number);
echo $result;
function calculateDigitSum(int $number): int
{
    return array_sum(str_split($number));
}
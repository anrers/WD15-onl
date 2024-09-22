<?php
//1. Написать функцию, которая принимает на вход два числа и
//возвращает их сумму
function numSum(int|float $num1, int|float $num2): int|float
{
    return $num1 + $num2;
}

echo numSum(123.456, 123.456) . PHP_EOL;
//2. Написать функцию, которая принимает на вход строку и возвращает
//ее длину
function getStrLength(string $str): int
{
    return strlen($str);
}

echo getStrLength('32512asfasgfsaqg') . PHP_EOL;
//3. Написать функцию, которая принимает на вход массив чисел и
//возвращает их среднее значение
function getArraySlice(array $array): int|float
{
    return array_sum($array) / sizeof($array);
}

echo getArraySlice([123, 123, 342]) . PHP_EOL;
//4. Написать функцию, которая принимает на вход два числа и
//определяет, какое из них больше
function getNumСomparison(int|float $num1, int|float $num2)
{
    if ($num1 > $num2) {
        return $num1;
    } elseif ($num1 < $num2) {
        return $num2;
    } else {
        return 'Числа равны';
    }
}

echo getNumСomparison(123, 123) . PHP_EOL;
//5. Написать функцию, которая принимает на вход две строки и
//возвращает их объединение
function getStrConc(string $str1, string $str2): string
{
    return $str1 . $str2;
}

echo getStrConc('123', 'asfgasg') . PHP_EOL;
//6. Написать функцию, которая принимает на вход строку и возвращает
//ее в верхнем регистре
function getStrUp(string $str): string
{
    return strtoupper($str);
}

echo getStrUp('asfgasg') . PHP_EOL;
//7. Написать функцию, которая принимает на вход строку и определяет,
//содержит ли она подстроку
function strWithSub(string $str, string $subStr): bool
{
    return str_contains($str, $subStr);
}

echo strWithSub('asfgasg', 'asf') . PHP_EOL;
//8. Найти среднее арифметическое двух чисел
function getNumsAvrs(int|float $num1, int|float $num2): int|float
{
    return ($num1 + $num2) / 2;
}

echo getNumsAvrs(123, 312) . PHP_EOL;
//9. Найти корень квадратный из числа
function getNumsSqrt(int|float $num1): int|float
{
    return sqrt($num1);
}
echo getNumsSqrt(16) . PHP_EOL;
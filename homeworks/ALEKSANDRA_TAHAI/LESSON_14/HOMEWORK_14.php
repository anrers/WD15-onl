<?php

//task 1 - Написать функцию, которая принимает на вход два числа и возвращает их сумму
function twoNumbers($firstNumber, $secondNumber)
{
    echo "сумма двух чисел: " . ($firstNumber + $secondNumber) . PHP_EOL;
}

twoNumbers(1, 4499449);

//task 2 - Написать функцию, которая принимает на вход строку и возвращает ее длину
function stringLength($string)
{
    return strlen($string);
}

echo "длина строки:" . stringLength("ajajajjajajajaja") . PHP_EOL;

//3. Написать функцию, которая принимает на вход массив чисел и возвращает их среднее значение
function arrayAverage($array)
{
    if ($array == 0) {
        return 0;
    } else {
        return array_sum($array) / count($array);
    }
}

echo "среднее значение массива данных: " . arrayAverage([0]) . PHP_EOL;

//4. Написать функцию, которая принимает на вход два числа и определяет, какое из них больше
function numberCompare($firstNumber, $secondNumber)
{
    $result = $firstNumber <=> $secondNumber;
    if ($result == 0) {
        echo "два числа равны" . PHP_EOL;
    } elseif ($result == 1) {
        echo $firstNumber . " больше числа " . $secondNumber . PHP_EOL;
    } else {
        echo $secondNumber . " больше числа " . $firstNumber . PHP_EOL;
    }
}

numberCompare(3, 5);

//5. Написать функцию, которая принимает на вход две строки и возвращает их объединение
function mixTwoStrings(string $firstString, string $secondString)
{
    return $firstString . $secondString;
}

echo mixTwoStrings("hahahaha", "hohoho") . PHP_EOL;

//6. Написать функцию, которая принимает на вход строку и возвращает ее в верхнем регистре
function stringUppercase(string $string)
{
    return strtoupper($string);
}

echo stringUppercase("hehehehPYPYPY") . PHP_EOL;

//7. Написать функцию, которая принимает на вход строку и определяет, содержит ли она подстроку
function researchSubstring($string, $substring)
{
    $result = strpos($string, $substring);
    if ($result !== false) {
        return "строка: '" . $string . "' содержит подстроку:" . $substring . PHP_EOL;
    } else {
        return "в строке $string нет такой подстроки :с";
    }
}

echo researchSubstring("good day", "od") . PHP_EOL;

//8. Найти среднее арифметическое двух чисел
function numbersAverage($firstNumber, $secondNumber)
{
    return (($firstNumber + $secondNumber) / 2);
}

echo "среднее арифметическое 2х чисел: " . numbersAverage(2, 3) . PHP_EOL;

//9. Найти корень квадратный из числа
function numberSquare($number)
{
    if ($number <= 0) {
        return "твоё число отстой и не подходит!";
    } else {
        return "корень квадратный из числа  $number: " . sqrt($number);
    }
}

numberSquare(21);
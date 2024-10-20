<?php

//  Напишите программу, которая выводит на экран сообщение в
//зависимости от возраста пользователя:
$age = 19;

if ($age < 18) {
    echo "Вы несовершеннолетний" . PHP_EOL;
}
if ($age > 65) {
    echo "Вы пенсионер" . PHP_EOL;
}
if ($age >= 18 && $age <= 65) {
    echo "Вы взрослый" . PHP_EOL;
}

//  Напишите программу, которая проверяет, является ли введенное
//пользователем число четным или нечетным, и выводит соответствующее
//сообщение
$number = 1245;

if ($number % 2 == 0) {
    echo "Число является четным" . PHP_EOL;
} else {
    echo "Число является нечетным" . PHP_EOL;
}

//  Напишите программу, которая выводит на экран сообщение в
//зависимости от значения переменной $dayOfWeek (от 1 до 7), которая
//содержит номер дня недели.
$dayOfWeek = 7;

switch ($dayOfWeek) {
    case 1:
        echo "Понедельник" . PHP_EOL;
        break;
    case 2:
        echo "Вторник" . PHP_EOL;
        break;
    case 3:
        echo "Среда" . PHP_EOL;
        break;
    case 4:
        echo "Четверг" . PHP_EOL;
        break;
    case 5:
        echo "Пятница" . PHP_EOL;
        break;
    case 6:
        echo "Суббота" . PHP_EOL;
        break;
    case 7:
        echo "Воскресенье" . PHP_EOL;
        break;
    default:
        echo "Данные введены некорректно" . PHP_EOL;
}

//  Напишите программу, которая определяет количество дней в месяце в
//зависимости от значения переменной $month (от 1 до 12), которая
//содержит номер месяца
$month = 11;

switch ($month) {
    case 2:
        echo "В этом месяце 28 дней" . PHP_EOL;
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        echo "В этом месяце 30 дней" . PHP_EOL;
        break;
    default:
        echo "В этом месяце 31 день" . PHP_EOL;
}
//  Напишите программу, которая принимает на вход строку, и определяет,
//является ли она палиндромом (т.е. читается одинаково в обоих
//направлениях), используя конструкцию match и функцию strrev:
//$string = "level";
$string = "level";

$strDefinition = match ($string === strrev($string)) {
    true => "Строка палиндром",
    false => "Строка не палиндром",
};

echo $strDefinition . PHP_EOL;

//  Напишите программу, которая принимает на вход число, и определяет,
//является ли оно четным, кратным 3 или кратным 5, используя
//конструкцию match
$number = 15;

$numMultiplicity = match (true) {
    $number % 2 === 0 => "Число является четным",
    $number % 3 === 0 => "Число кратно 3",
    $number % 5 === 0 => "Число кратно 5",
    default => "Число не четное и не кратно 3 или 5",
};

echo $numMultiplicity . PHP_EOL;

// Задача на поиск суммы нечетных чисел от 1 до N
$num = 10;
$sum = 0;
$i = 1;

while ($i <= $num) {
    if ($i % 2 != 0) {
        $sum += $i;
    }
    $i++;
}

echo "Сумма нечетных чисел равна $sum" . PHP_EOL;

// Задача на поиск первого положительного числа, кратного 7
$i = 1;

while (true) {
    if ($i % 7 == 0) {
        echo "Первое положительное число, кратное 7 равно $i" . PHP_EOL;
        break;
    }
    $i++;
}

//  Поиск суммы элементов массива
$numbers = [1, 2, 3, 4, 5];
$sum = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}
echo "Сумма элементов массива равна $sum" . PHP_EOL;

// Собрать массив четных чисел из входного массива
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 === 0) {
        $evenNumbers[] = $numbers[$i];
    }
}
print_r($evenNumbers) . PHP_EOL;


//Добавить новый элемент в ассоциативный массив и вывести все
//значения данного массива
$order = ["id" => 1, "customer" => "John", "sum" => 152];
$order["region"] = "Minsk";

foreach ($order as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}

// Объединить нескольких ассоциативных массивов в один и вывести
//результат (ключ, значение), через foreach
$firstArray = [
    "name" => "Товар 1",
    "id" => 1
];

$secondArray = [
    "price" => 15,
    "discPrice" => 13
];

$arraySum = array_merge($firstArray, $secondArray);

foreach ($arraySum as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}
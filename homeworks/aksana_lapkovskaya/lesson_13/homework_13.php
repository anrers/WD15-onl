<?php

$newline = (PHP_SAPI === 'cli') ? "\n" : "<br>";

// task1
$x = 5;
$newValue = $x + 3;
echo $newValue . $newline;

// task2
$a = 10;
$b = 7;
echo $a / $b . $newline;

// task3
$name = "Алиса";
$age = 25;
echo "Меня зовут $name, и мне $age лет" . $newline;

// task4
$y = 12;
$newNumber = $y * 2;
echo $newNumber . $newline;

// task5
$x = 6;
$y = 4;
echo $x * $y . $newline;

// task6
$numberOne = 7;
$numberTwo = 3;
echo $numberOne + $numberTwo . $newline;

// task7
$someText = "может быть";
echo $someText . " мне нравится программирование" . $newline;

// task8
$number = 2;
++$number;
echo $number . $newline;

//task9
$stringOne = "Привет";
$stringTwo = "Мир";
$result = $stringOne . " " . $stringTwo;
echo $result . $newline;

//task10
$stringValue = "12";
$intValue = 18;
$result = $stringValue + $intValue;
echo $result;

<?php
//Напишите скрипт PHP, который будет открывать файл example.txt в
//режиме записи и записывать в него случайные числа от 1 до 1000,
//разделенные пробелами. Запишите в файл 10 случайных чисел.
//После записи чисел закройте файл. Затем откройте этот файл
//снова в режиме чтения и выведите на экран сумму всех чисел,
//которые были записаны в файл.

$file = fopen("example.txt", "w");

$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $randomNumber = rand(1, 1000);
    $numbers[] = $randomNumber;
    fwrite($file, $randomNumber . " ");
}

fclose($file);

$file = fopen("example.txt", "r");
$data = fgets($file);
$numbers = explode(" ", trim($data));
$sum = array_sum($numbers);

echo "Сумма всех чисел записанных в файл равно " . $sum;
fclose($file);
<?php
// Открываем example в режиме записи "w"
$file = fopen("example.txt", "w");


$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $random_number = rand(1, 1000);
    $numbers[] = $random_number;
    fwrite($file, $random_number . " ");
}

// Закрываем файл после записи
fclose($file);

// Открываем файл example в режиме чтения "r"
$file = fopen("example.txt", "r");

// Читаем содержимое файла
$content = fgets($file);

// Преобразуем содержимое в массив чисел
$numbers = explode(" ", trim($content));  // Убираем лишние пробелы и делим строку на числа

// Считаем сумму чисел
$sum = array_sum($numbers);


echo "Сумма чисел: " . $sum;

// Закрываем файл после чтения
fclose($file);

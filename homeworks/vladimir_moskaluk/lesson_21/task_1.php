<?php
// Открываем (или создаём) файл example.txt в режиме записи "w"
$file = fopen("example.txt", "w");

// Записываем строку "Hello, world!" в файл
fwrite($file, "Hello, world!");

// Закрываем файл после записи
fclose($file);

// Открываем файл example.txt в режиме чтения ("r")
$file = fopen("example.txt", "r");

// Читаем содержимое файла и выводим на экран
echo "Содержимое файла: " . fgets($file);

// Закрываем файл после чтения
fclose($file);

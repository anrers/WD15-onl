<?php
//Создайте файл example.txt и запишите в него текст "Hello, world!" с
//помощью функции fwrite(). Затем откройте этот файл и выведите его
//содержимое на экран с помощью функции fgets()

$file = fopen("example.txt", "w");
fwrite($file, "Hello, world!");
fclose($file);

$file = fopen("example.txt", "r");
echo "Содержимое: " . fgets($file);
fclose($file);
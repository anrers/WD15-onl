<?php   

$file = fopen("example.txt", "w");

fwrite($file, "Hello, world!");

fclose($file);

$file = fopen("example.txt", "r");

$content = fgets($file);

echo $content;

fclose($file);
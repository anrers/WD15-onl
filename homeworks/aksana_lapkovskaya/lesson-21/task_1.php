<?php

$file = fopen("example.txt", "w");

fwrite($file, "Hello, world!");

fclose($file);

$file = fopen("example.txt", "r");

while (($line = fgets($file)) !== false) {
    echo $line;
}

fclose($file);
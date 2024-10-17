<?php

$file = fopen("example.txt", "w");

$random_numbers = [];
for ($i = 0; $i < 10; $i++) {
    $random_number = rand(1, 1000);
    $random_numbers[] = $random_number;
    fwrite($file, $random_number . " ");
}

fclose($file);

$file = fopen("example.txt", "r");

$content = fgets($file);
$numbers = explode(" ", trim($content));
$sum = array_sum($numbers);

fclose($file);

echo "The sum of the random numbers is: $sum";
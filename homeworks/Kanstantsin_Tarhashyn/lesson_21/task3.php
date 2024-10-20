<?php   

$file = fopen ("example.txt","w");

$numbers = [];

for ($i = 0; $i < 10; $i++) {
    $randomNumber = rand(1, 1000);
    $numbers[] = $randomNumber;
    fwrite($file, $randomNumber ." ");
}

fclose($file);

$file = fopen("example.txt","r");

$fileContent = fgets($file);
var_dump($fileContent);
$numbers = explode(" ", trim($fileContent));
$sum = array_sum($numbers);

fclose($file);

echo "The sum of the random numbers is: $sum";

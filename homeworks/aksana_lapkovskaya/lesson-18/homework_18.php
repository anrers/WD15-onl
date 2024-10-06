<?php

// If task1
$age = 64;

if ($age < 18) {
    echo "You are a minor" . PHP_EOL;
}
if ($age > 65) {
    echo "You are a senior" . PHP_EOL;
}
if ($age >= 18 && $age <= 65) {
    echo "You are an adult" . PHP_EOL;
}

// If task2
$number = 3;

if ($number % 2 == 0) {
    echo "The number is even" . PHP_EOL;
} else {
    echo "The number is odd" . PHP_EOL;
}

// Switch task1
$dayOfWeek = 3;

switch ($dayOfWeek) {
    case 1:
        echo "Monday" . PHP_EOL;
        break;
    case 2:
        echo "Tuesday" . PHP_EOL;
        break;
    case 3:
        echo "Wednesday" . PHP_EOL;
        break;
    case 4:
        echo "Thursday" . PHP_EOL;
        break;
    case 5:
        echo "Friday" . PHP_EOL;
        break;
    case 6:
        echo "Saturday" . PHP_EOL;
        break;
    case 7:
        echo "Sunday" . PHP_EOL;
        break;
    default:
        echo "Invalid day of the week" . PHP_EOL;
}

// Switch task2
$month = 2;

switch ($month) {
    case 2:
        echo "This month has 28 days" . PHP_EOL;
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        echo "This month has 30 days" . PHP_EOL;
        break;
    default:
        echo "This month has 31 days" . PHP_EOL;
}
// Match task1
$string = "level";

$result = match ($string === strrev($string)) {
    true => "The string is a palindrome",
    false => "The string is not a palindrome",
};

echo $result . PHP_EOL;

// Match task2
$number = 15;

$result = match (true) {
    $number % 2 === 0 => "The number is even",
    $number % 3 === 0 => "The number is divisible by 3",
    $number % 5 === 0 => "The number is divisible by 5",
    default => "The number is not divisible by 2, 3, or 5",
};

echo $result . PHP_EOL;

// While task1
$num = 10;
$sum = 0;
$i = 1;

while ($i <= $num) {
    if ($i % 2 != 0) {
        $sum += $i;
    }
    $i++;
}

echo "The sum of odd numbers from 1 to $num is $sum" . PHP_EOL;

// While task2
$i = 1;

while (true) {
    if ($i % 7 == 0) {
        echo "The first positive number divisible by 7 is $i" . PHP_EOL;
        break;
    }
    $i++;
}

// For task1
$numbers = [1, 2, 3, 4, 5];
$sum = 0;

foreach ($numbers as $number) {
    $sum += $number;
}

print_r("The sum of the array elements is: $sum") . PHP_EOL;

// For task2
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];

foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $evenNumbers[] = $number;
    }
}

print_r($evenNumbers);

//Foreach task1
$person = [
    "name" => "John Smith",
    "age" => 25,
    "city" => "Dallas"
];

$person["job"] = "Corocodile feeder";

foreach ($person as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}

//Foreach task2
$arrayOne = [
    "name" => "Samantha",
    "age" => 35
];

$arrayTwo = [
    "city" => "New York",
    "job" => "Public Relations Executive"
];

$combinedArrays = array_merge($arrayOne, $arrayTwo);

foreach ($combinedArrays as $key => $value) {
    echo "$key: $value" . PHP_EOL;
}
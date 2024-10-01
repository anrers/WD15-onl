<?php

// task1
$array = [1, 2, 3, 4, 5];
var_dump($array[1]);

// task2
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
var_dump(array_sum($array));

// task3
$array = ["яблоко", "банан", "апельсин", "груша", "ананас"];
sort($array);
var_dump($array);

// task4
$array = [
    ["apple", "red", "green"],
    ["banana", "yellow", "green"],
    ["orange", "orange"],
    ["pear", "green"],
    ["pineapple", "brown"]
];
var_dump($array[1][2]);

// task5
$array = [
    "apples" => "$2.99",
    "oranges" => "$1.99",
    "pineapples" => "$4.99"
];
var_dump($array["oranges"]);

// task6
$array = [
    "apples" => "$2.99",
    "oranges" => "$1.99",
    "pineapples" => "$4.99"
];
$key = "oranges";

function findByKey(array $array, string $key)
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return null;
}

var_dump(findByKey($array, $key));

// task7
$array = [
    "apples" => "$2.99",
    "oranges" => "$1.99",
    "pineapples" => "$4.99"
];

function findBiggestValue(array $array)
{
    return max($array);
}

var_dump(findBiggestValue($array));

// task8
$array = [
    "apples" => 1,
    "oranges" => 4,
    "pineapples" => 56,
    "kiwi" => 2
];

function arraySort(array $array)
{
    asort($array);
    return $array;
}

var_dump(arraySort($array));

// task9
function applyCallbackToArray(array $array, callable $callback)
{
    $result = [];
    foreach ($array as $element) {
        $result[] = $callback($element);
    }
    return $result;
}

function multiplyByTwo(int $num)
{
    return $num * 2;
}

$numbers = [1, 2, 3, 4, 5];
$newArray = applyCallbackToArray($numbers, 'multiplyByTwo');
var_dump($newArray);

// task10
$string = "Hello, world!";
var_dump($string);

// task11
$str1 = "Hello";
$str2 = "world!";
var_dump($str1 . ", " . $str2);

// task12
$string = "Hello World!";
$w = substr($string, 6, 1);
$o = substr($string, 4, 1);
var_dump($w . $o);

// task13
$string = "Hello World!";
$substring = "World";

function findSubstring(string $string, string $substring)
{
    if (str_contains($string, $substring)) {
        return "Contains World";
    }
    return "Does not contain World";
}

var_dump(findSubstring($string, $substring));

// task14
$string = "Hello world!";

function stringReplace(string $string)
{
    return str_replace("world", "everyone", $string);
}

var_dump(stringReplace($string));

// task15
$string = "<p>Hello, <b>world</b>!</p>";

function removeTags(string $string)
{
    return strip_tags($string);
}

var_dump(removeTags($string));

// task16
$string = "HeLLo, WorLd!";

function stringToLower(string $string)
{
    return strtolower($string);
}

var_dump(stringToLower($string));

// task17
$string = "apple,orange,banana";

function stringToExplode(string $string)
{
    return explode(",", $string);
}

var_dump(stringToExplode($string));
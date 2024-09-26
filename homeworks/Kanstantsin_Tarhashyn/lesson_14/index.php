<?php

//1st task

$int1 = 10;
$int2 = 13;

function sum($int1, $int2) {
    return $int1 + $int2;
}

$result = sum($int1, $int2);
print_r("$result <br>");
 

//2nd task

$string = "qwertyasdfgh";

function length($string) {
    return strlen($string);
}

$result = length($string);
print_r("$result <br>");

//3rd task

$array = [1, 11, 22, 33];

function calculateAverage($array) {
    if (count($array) === 0) {
        return 0;
    }

    $sum = array_sum($array);
    $count = count($array);
    $average = $sum / $count;
    return $average;
}

$result = calculateAverage($array);
print_r("$result <br>");

//4th task

$int1 = 10;
$int2 = 10;

function compareInts($int1, $int2) {
    if ($int1 > $int2) {
        return $int1;
    } else if ($int2 > $int1) {
        return $int2;
    } else {
        return "neither from these numbers. They are equal";
    }
}

$result = compareInts($int1, $int2);
print_r("The larger number is {$result} <br>");

//5th task

$stringOne = "Hello, ";
$stringTwo = "World!";

function combineStrings($string1, $string2) {
    return $string1 . $string2;
}

$result = combineStrings($stringOne, $stringTwo);
print_r("$result <br>");

//6th task

$stringToCapitalize = "qwerty";

function capitalize($string) {
    $string = strtoupper($string);
    return $string;
}

$result = capitalize($stringToCapitalize);
print_r("$result <br>");

//7th task 

$string = 'qwerty';
$findMe1 = 'q';
$findMe2 = 'a';

function matchable($string, $stringMatch) {
    $pos = stripos ($string, $stringMatch);

    if ($pos === false) {
        return "String <b>{$stringMatch}</b> wasn't found in string <b>{$string}</b>";
    } else {
        return "String <b>{$stringMatch}</b> was found in string <b>{$string}</b>";
    }
}

$result1 = matchable($string, $findMe1);
$result2 = matchable($string, $findMe2);
print_r("$result1 <br>");
print_r("$result2 <br>");

//8th task

$int1 = 10;
$int2 = 20;

function averageSum($int1, $int2) {
    $sum = $int1 + $int2;
    $average = $sum / 2;

    return $average;
}

$result = averageSum($int1, $int2);
print_r("$result <br>");

//9th task

$int = 255;

function squareRoot($int) {
    return sqrt($int);
}

$result = squareRoot($int);
print_r("$result <br>");
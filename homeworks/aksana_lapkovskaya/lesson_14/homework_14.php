<?php

//task1
function sumValues($a, $b)
{
    return $a + $b;
}

print_r(sumValues(8, 10));
?>

<?php

//task2
function stringLength($string)
{
    return strlen($string);
}

print_r(stringLength("Some random text"));
?>

<?php

//task3
function averageSum(...$numbers)
{
    $count = count($numbers);
    $sum = array_sum($numbers);
    return $sum / $count;
}

print_r(averageSum(8, 9, 10, 11, 12, 13, 14, 15));
?>

<?php

//task4
function numberCheck($numberOne, $numberTwo)
{
    if ($numberOne > $numberTwo) {
        return "$numberOne is bigger than $numberTwo";
    } elseif ($numberOne < $numberTwo) {
        return "$numberOne is smaller than $numberTwo";
    } elseif ($numberOne == $numberTwo) {
        return "$numberOne is equal to $numberTwo";
    } else {
        return "No result";
    }
}

print_r(numberCheck(4, 5));
?>

<?php

//task5
function stringConcatination(string $stringOne, string $stringTwo)
{
    return $stringOne . " " . $stringTwo;
}

print_r(stringConcatination("Hello", "World"));
?>

<?php

//task6
function stringToUpper(string $string)
{
    return strtoupper($string);
}

print_r(stringToUpper("hello"));
?>

<?php

//task7
$stringOne = "Hello World";
$stringTwo = "Earth";
function containsSubstring(string $string, string $substring)
{
    if (strpos($string, $substring) !== false) {
        return "$string contains $substring";
    } else {
        return "$string does not contain $substring";
    }
}

print_r(containsSubstring($stringOne, $stringTwo));
?>

<?php

//task8
$numberOne = 5;
$numberTwo = 10;

function findAverage(int $numberOne, int $numberTwo)
{
    $average = ($numberOne + $numberTwo) / 2;
    return $average;
}

print_r(findAverage($numberOne, $numberTwo));
?>

<?php

//task9
function squareRoot(int $number)
{
    return sqrt($number);
}

print_r(squareRoot(9));
?>
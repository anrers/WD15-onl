<?php
//Задание №1
function  isBalanced($string): bool
{
    $baseArray = str_split($string);
    $longarr = array_chunk($baseArray, count($baseArray)/2);
    $longarrRight= [];
    foreach ($longarr[1] as $value) {
    switch ($value) {
        case ')':
            $longarrRight[] = '(';
            break;
        case '}':
            $longarrRight[] = '{';
            break;
        case ']':
            $longarrRight[] = '[';
            break;
        default:
            $longarrRight[] = '';
        }
    }
    return $longarr[0] === array_reverse($longarrRight);
}

var_dump(isBalanced('[{(({}))}]'));

//Задание №2
function calculateDigitSum(int $number): int 
{
    $numberToString = (string)$number;
    $numberToArray = [];
    for ($i = 0; $i < strlen($numberToString); $i++) {
        $numberToArray[] = (int)$numberToString[$i];
    }
    return array_sum($numberToArray);
}

$number = 12345;
$result = calculateDigitSum($number);
echo $result; // Вывод: 15







<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Utils\BracketBalancer;
use App\Utils\DigitSumCalculator;

// Проверка сбалансированности скобок
$string1 = "(([{()}]))";
$result1 = BracketBalancer::isBalanced($string1);
echo "Строка \"$string1\" сбалансирована: " . ($result1 ? 'true' : 'false') . PHP_EOL;

$string2 = "({[)}]";
$result2 = BracketBalancer::isBalanced($string2);
echo "Строка \"$string2\" сбалансирована: " . ($result2 ? 'true' : 'false') . PHP_EOL;

// Подсчет суммы цифр числа
$number = 12345;
$result3 = DigitSumCalculator::calculateDigitSum($number);
echo "Сумма цифр числа $number: $result3" . PHP_EOL;

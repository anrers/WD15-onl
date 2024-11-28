<?php

//Задача 2
//Напишите функцию на PHP, которая принимает строку в качестве
//аргумента и подсчитывает частоту встречаемости каждого слова в этой
//строке. Функция должна возвращать ассоциативный массив, где
//ключами будут слова, а значениями – их частота встречаемости.

$text = "The quick brown fox jumps over the lazy dog brown fox jumps over the lazy dog";
function  countWordFrequency($text): array
{
    return array_count_values(str_word_count($text, 1));
}

$result = countWordFrequency($text);
print_r($result);

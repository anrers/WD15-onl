<?php
function countWordFrequency(string $text): array
{
    $strtolowered = strtolower($text);
    $trimmed = trim($strtolowered);
    $str = preg_replace('/\pP/iu', '', $trimmed);
    $pieces = explode(" ", $str);
    $resArr = array_count_values($pieces);
    arsort($resArr);
   return $resArr;
}



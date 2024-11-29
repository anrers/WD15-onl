<?php

function countWordFrequency(string $string): array
{
    $string = preg_split("#[\s,.]+#", $string);
    unset($string[array_search('', $string)]);
    $string = array_count_values($string);
    return $string;
}

print_r(countWordFrequency('Edit Edit the Expression & Text to see matches. terns. describes your expression in plain English. .....'));
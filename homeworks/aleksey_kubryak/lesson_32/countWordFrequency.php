<?php

function countWordFrequency(string $string): array
{
    $string = strtolower(preg_replace('/[^a-z0-9\s]/', '', $string));
    
    $words = explode(' ', $string);
    
    return array_count_values(array_filter($words));
}
<?php

function countWordFrequency ($text)
{
    $text = strtolower($text);
    $text = preg_replace('/[^\w\s]/u', '', $text);

    $words = explode(" ", $text);

    $wordFrequency = [];

    foreach ($words as $word) {
        $word = trim($word);

        if ($word == '') {
            continue;
        }

        if (isset($wordFrequency[$word])) {
            $wordFrequency[$word]++;
        } else {
            $wordFrequency[$word] = 1;
        }
    }

    return $wordFrequency;
}

$text = "The quick quick brown fox fox jumps over the lazy dog 111";
$result = countWordFrequency($text);
print_r($result);
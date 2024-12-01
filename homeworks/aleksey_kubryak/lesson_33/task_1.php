<?php

function isBalanced(string $string): bool 
{
    $stack = [];
    $brackets = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        
        if (isset($brackets[$char])) {
            if (empty($stack) || array_pop($stack) !== $brackets[$char]) {
                return false;
            }
        } else {
            $stack[] = $char;
        }
    }
    return empty($stack);
}

$string1 = "(([{()}]))";
$result1 = isBalanced($string1);
var_dump($result1);

$string2 = "({[)}]";
$result2 = isBalanced($string2);
var_dump($result2);
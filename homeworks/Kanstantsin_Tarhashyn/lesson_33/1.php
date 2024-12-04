<?php

function balancedString ($string)
{
    $array = [];

    $brackets = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if (in_array($char, ['(', '[', '{'])) {
            $array[] = $char;
        }
        elseif (in_array($char, [')', ']', '}'])) {
            if (empty($array) || array_pop($array) !== $brackets[$char]) {
                return false;
            }
        }
    }

    return empty($array);
}

$string1 = "(([{()}]))";
$result1 = balancedString($string1);
echo $result1 ? 'true ' : 'false ';

$string2 = "({[)}]";
$result2 = balancedString($string2);
echo $result2 ? 'true ' : 'false ';
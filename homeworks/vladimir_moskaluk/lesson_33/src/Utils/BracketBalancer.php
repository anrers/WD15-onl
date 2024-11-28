<?php

declare(strict_types=1);

namespace App\Utils;

class BracketBalancer
{
    public static function isBalanced(string $input): bool
    {
        $stack = [];
        $pairs = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];

        for ($i = 0, $len = strlen($input); $i < $len; $i++) {
            $char = $input[$i];
            if (in_array($char, $pairs, true)) {
                $stack[] = $char;
            } elseif (isset($pairs[$char])) {
                if (empty($stack) || array_pop($stack) !== $pairs[$char]) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}

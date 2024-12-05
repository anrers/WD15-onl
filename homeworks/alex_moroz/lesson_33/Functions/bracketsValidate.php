<?php

function isBalanced(string $stroke): bool
{
    $stroke = preg_replace('#[^{}()\[\]]#', '', $stroke); // Удаляем все символы, кроме скобок
    if (strlen($stroke) % 2 !== 0) {
        return false;
    }
    return areBracketsBalanced($stroke);
}

function areBracketsBalanced(string $stroke): bool
{
    $stack = [];
    $brackets = [
        '{' => '}',
        '(' => ')',
        '[' => ']',
    ];

    foreach (str_split($stroke) as $char) {
        // Если это открывающая скобка, добавляем в стек
        if (isset($brackets[$char])) {
            $stack[] = $char;
        } elseif (in_array($char, $brackets)) {
            // Если это закрывающая скобка, проверяем стек
            // array_pop извлекает и возвращает значение последнего элемента массива array, уменьшая размер array на один элемент
            if (empty($stack) || $brackets[array_pop($stack)] !== $char) {
                return false; // Неправильная последовательность
            }
        }
    }

    // Если стек пуст, значит все скобки сбалансированы
    return empty($stack);
}
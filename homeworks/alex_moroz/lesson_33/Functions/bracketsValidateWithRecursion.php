<?php

function isBalancedWithRecursion(string $stroke): bool
{
    $stroke = preg_replace('#[^{}()\[\]]#', '', $stroke); // Удаляем все символы, кроме скобок
    if (strlen($stroke) % 2 != 0) {
        return false;
    }
    return empty(getUnbalancedBrackets($stroke));
}

function getUnbalancedBrackets(string $stroke): string
{
    $brackets = ['{}', '()', '[]'];
    //Условие выхода из рекурсии: проверяем, есть ли сбалансированные скобки, которые можно удалить
    if (str_replace($brackets, '', $stroke) !== $stroke) {
        $stroke = str_replace($brackets, '', $stroke);
        return getUnbalancedBrackets($stroke); //Рекурсивный вызов
    }
    return $stroke;
}
<?php

declare(strict_types=1);

/**
 * Подсчитывает частоту встречаемости каждого слова в строке.
 *
 * @param string $text Исходная строка.
 * @return array Ассоциативный массив с частотой встречаемости слов.
 */
function countWordFrequency(string $text): array
{
    //$text = mb_strtolower($text); - при необходимости, чтобы The и the учитывалось как одно и тоже слово,
    //раскомментируй эту строку кода, чтобы весь текст преобразовать к нижнему регистру.

    $words = explode(' ', $text); // Разбиваем строку на слова
    $wordFrequency = [];

    foreach ($words as $word) {
        $word = trim($word); // Убираем лишние пробелы
        if ($word === '') {
            continue; // Пропускаем пустые слова
        }

        if (isset($wordFrequency[$word])) {
            $wordFrequency[$word]++;
        } else {
            $wordFrequency[$word] = 1;
        }
    }

    return $wordFrequency;
}

// Пример использования
$text = "The quick brown fox jumps over the lazy dog";
$result = countWordFrequency($text);
print_r($result);


//Вместо написания вышеуказанной функции, можно использовать встроенные функции PHP.
//Тогда весь код сведется, к одной строчке
//print_r($result = array_count_values(str_word_count(mb_strtolower($text), 1)));
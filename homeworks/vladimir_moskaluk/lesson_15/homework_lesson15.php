<?php
//1. Создайте массив из 5 элементов и выведите на экран второй элемент.
$elements = [10, 20, 30, 40, 50];
echo $elements[1];

//2. Создайте массив чисел от 1 до 10, найдите сумму элементов массива и выведите на экран, используя функцию array_sum.
$numbers = range(1, 10);
echo array_sum($numbers);

//3. Создайте массив строк, отсортируйте его в алфавитном порядке и выведите на экран.
$strings = ["banana", "apple", "grape", "orange", "cherry"];
sort($strings);
print_r($strings);

//4. Создайте двумерный массив и выведите на экран элемент, расположенный во втором ряду и третьем столбце.
$array = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $array[1][2];

//5. Создайте ассоциативный массив, где ключами будут названия фруктов, а значениями - их цена в рублях за килограмм. Выведите на экран цену апельсинов.
$fruits = [
    "apple" => 100,
    "banana" => 50,
    "orange" => 70
];
echo $fruits["orange"];

//6. Найти значение по ключу. Напишите функцию, которая принимает ассоциативный массив и ключ, и возвращает значение, связанное с этим ключом, если ключ существует, и null в противном случае.
function getValueByKey($array, $key) {
    return $array[$key] ?? null;
}

$fruits = [
    "apple" => 100,
    "banana" => 50,
    "orange" => 70
];

echo getValueByKey($fruits, "banana");

//7. Поиск наибольшего значения. Напишите функцию, которая принимает ассоциативный массив и возвращает наибольшее значение из всех значений в массиве.
function getMaxValue($array) {
    return max($array);
}

$fruits = [
    "apple" => 100,
    "banana" => 50,
    "orange" => 70
];

echo getMaxValue($fruits);

//8. Сортировка по значениям. Напишите функцию, которая принимает ассоциативный массив и сортирует его по значениям.
function sortByValues($array) {
    asort($array);
    return $array;
}

$fruits = [
    "apple" => 100,
    "banana" => 50,
    "orange" => 70
];

print_r(sortByValues($fruits));

//9. У вас есть массив чисел. Напишите функцию, которая принимает этот массив и колбек функцию в качестве аргументов. Функция должна применить колбек к каждому элементу массива и вернуть новый массив, содержащий результаты применения колбека к каждому элементу.
function applyCallbackToArray($array, $callback) {
    return array_map($callback, $array);
}

$numbers = [1, 2, 3, 4, 5];

$result = applyCallbackToArray($numbers, function($n) {
    return $n * 2;
});

print_r($result);

//10. Создание строк. Создайте переменную $string и присвойте ей значение "Привет, мир!".
$string = "Привет, мир!";
echo $string;

//11. Сцепление строк. Создайте переменные $str1 и $str2 и склейте их вместе с помощью оператора ".".
$str1 = "Hello";
$str2 = "World";
echo $str1 . " " . $str2;

//12. Извлечение символов из строк. Извлеките символы "w" и "o" из cтроки "Hello World!".
// Вариант 1. Если под словом извлечение понималось вывести символы.
$string = "Hello World!";
echo $string[6];
echo $string[4];
// Вариант 2. Если под словом извлечение понималось удалить символы из строки.
$string = "Hello World!";
$result = str_ireplace(['w', 'o'], '', $string);
echo $result;

//13. Поиск подстроки. Проверьте, содержит ли строка "Hello World!" подстроку "World".
$string = "Hello World!";                                 /**strpos — Возвращает позицию первого вхождения подстроки*/
if (strpos($string, "World") !== false) {         /**!== строгое сравнение используется, чтобы не перепутать значение индекса 0(если искомая подстрока начинается с первого символа), со значением false (если подстрока не найдена)*/
    echo "Подстрока найдена";
}

//14. Замена подстроки. Замените все вхождения подстроки "world" на "everyone" в строке "Hello world!".
$string = "Hello world!";
$newString = str_replace("world", "everyone", $string);
echo $newString;

//15. Обработка HTML-тегов. Удалите все HTML-теги из строки "<p>Hello, <b>world</b>!</p>".
$html = "<p>Hello, <b>world</b>!</p>";
echo strip_tags($html);

//16. Преобразование регистра. Преобразуйте строку "HeLLo, WorLd!" к нижнему регистру.
$string = "HeLLo, WorLd!";
echo strtolower($string);

//17. Разбиение строки на подстроки. Разбейте строку "apple,orange,banana" на массив из трех элементов.
$string = "apple,orange,banana";
$array = explode(",", $string);
print_r($array);


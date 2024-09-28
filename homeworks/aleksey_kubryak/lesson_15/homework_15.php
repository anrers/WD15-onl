<?php
// lesson 15
$products = [
    [
        'id' => 1,
        'name' => 'Product 1',
        'price' => 1000,
        'sort' => 100,
        'quantity' => 200,
    ],
    [
        'id' => 5,
        'name' => 'Product 2',
        'price' => 312,
        'sort' => 13,
        'quantity' => 4,
    ],
    [
        'id' => 7,
        'name' => 'Product 3',
        'price' => 1890.50,
        'sort' => 200,
        'quantity' => 100,
    ],
];
$products[] = [
    'id' => 9,
    'name' => 'Product 4',
    'price' => 18,
    'sort' => 18,
    'quantity' => 16,
];
// 2. Написать функцию добавления товара в массив, 1 аргумент массив по ссылке, $id $name $price обязательные параметры, 
// $sort = 100 $quantity = 0 необязательные параметры
function addProducts(&$products, $id, $name, $price, $sort = 100, $quantity = 0) {
    // Усложнить функцию, добавить проверку id на уникальность. Если товар с таким id существует, то ничего не делать
    if (in_array($id, array_column($products, 'id'))) {
        return;
    };
    $products[] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'sort' => $sort,
        'quantity' => $quantity
    ];
};

addProducts($products, 11, 'Product 5', 1600);
addProducts($products, 11, 'Product 6', 1600);

// Переиндексировать массив так чтобы ключами стали id товаров
$indexedProducts = array_column($products, null, 'id');
print_r($indexedProducts);
// 5. Отсортировать массив по ключу sort
usort($products, function($key1, $key2) {
    return $key1['sort'] <=> $key2['sort'];
});
print_r($products);
// 6. Написать функцию удаления товара по id из массива
function deleteProductById(&$products, $id) {
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset( $products[$key] );
        };
    };
};
deleteProductById( $products, 5 );
print_r($products);
// 7. Усложнить функцию добавления, добавить обновление полей товара если товар с id уже есть, если нет то добавить новый
function addProductsById(&$products, $id, $name, $price, $sort = 100, $quantity = 0) {
    $index = array_search($id, array_column($products, 'id'));
    if ($index !== false) {
        $products[$index]['name'] = $name;
        $products[$index]['price'] = $price;
        $products[$index]['sort'] = $sort;
        $products[$index]['quantity'] = $quantity;
    } else {
        $products[] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'sort' => $sort,
            'quantity' => $quantity
        ];
    };
};
// 8. Отсортировать массив по 2 ключам: sort и price
usort($products, function($key1, $key2) {
    if ($key1['sort'] === $key2['sort']) {
        return $key1['price'] <=> $key2['price'];
    };
    return $key1['sort'] <=> $key2['sort'];
});
// Создайте массив из 5 элементов и выведите на экран второй элемент.
$array = ['first', 'second', 'third', 'fourth', 'fifth'];
echo $array[1] . PHP_EOL;
// Создайте массив чисел от 1 до 10, найдите сумму элементов массива и выведите на экран, используя функцию array_sum.
$arrayNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo array_sum($arrayNum) . PHP_EOL;
// Создайте массив строк, отсортируйте его в алфавитном порядке и выведите на экран.
$arrayStr = ['first', 'second', 'third', 'fourth', 'fifth'];
sort($arrayStr);
foreach ($arrayStr as $value) {
    echo $value . "\n";
};
// Создайте двумерный массив и выведите на экран элемент, расположенный во втором ряду и третьем столбце.
$twoDimensionalArr = [
    ["apple", "banana", "cherry"],
    ["dog", "cat", "mouse"],
    ["red", "blue", "green"],
];
echo $twoDimensionalArr[1][2] . PHP_EOL;
// Создайте ассоциативный массив, где ключами будут названия фруктов, а значениями - их цена в рублях за килограмм. Выведите на экран цену апельсинов.
$fruitPrices = [
    'apple' => 100, 
    'banana' => 78, 
    'cherry' => 12, 
    'pomegranate' => 45,
    'orange' => 19,
];
echo $fruitPrices['orange'] . PHP_EOL;
// Найти значение по ключу. Напишите функцию, которая принимает ассоциативный массив и ключ, 
// и возвращает значение, связанное с этим ключом, если ключ существует, и null в противном случае.
function findKey($array, $key) {
    if (array_key_exists($key, $array)) {
        return $array[$key];
    } else {
        return null;
    };
};
$fruitPrices = [
    'apple' => 100, 
    'banana' => 78,
];
var_dump(findKey($fruitPrices,'app')) . PHP_EOL;
// Поиск наибольшего значения. Напишите функцию, которая принимает ассоциативный массив и возвращает наибольшее значение из всех значений в массиве.
function getHighestValue($array) {
    return max($array);
};
$fruitPrices = [
    'apple' => 100, 
    'banana' => 78, 
    'cherry' => 12, 
    'pomegranate' => 45,
    'orange' => 19,
];
echo getHighestValue($fruitPrices) . PHP_EOL;
// Сортировка по значениям. Напишите функцию, которая принимает ассоциативный массив и сортирует его по значениям.
function sortValue($array) {
    arsort($array);
    return $array;
};
$fruitPrices = [
    'apple' => 100, 
    'banana' => 78, 
    'cherry' => 12, 
    'pomegranate' => 45,
    'orange' => 19,
];
var_dump(sortValue($fruitPrices)) . PHP_EOL;
// У вас есть массив чисел. Напишите функцию, которая принимает этот массив и колбек функцию в качестве аргументов. 
// Функция должна применить колбек к каждому элементу массива и вернуть новый массив, содержащий результаты применения колбека к каждому элементу.
function applyCallback($arrayNum, $callback) {
    return array_map($callback, $arrayNum);;
};
$arrayNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$callback = function($num) {
    return -$num;
};
print_r(applyCallback($arrayNum, $callback)) . PHP_EOL;
// Создание строк. Создайте переменную $string и присвойте ей значение "Привет, мир!".
$string = "Привет, мир!";
// Сцепление строк. Создайте переменные $str1 и $str2 и склейте их вместе с помощью оператора ".".
$str1 = "Привет, ";
$str2 = "мир!";
echo $str1 . $str2 . PHP_EOL;
// Извлечение символов из строк. Извлеките символы "w" и "o" из строки "Hello World!".
$string = "Hello World!";
$result = str_ireplace(['w', 'o'], '', $string);
echo $result . PHP_EOL;
// Поиск подстроки. Проверьте, содержит ли строка "Hello World!" подстроку "World".
$string = "Hello World!";
var_dump(str_contains($string,"World")) . PHP_EOL;
// Замена подстроки. Замените все вхождения подстроки "world" на "everyone" в строке "Hello world!".
$string = "Hello World!";
echo str_ireplace('world', 'everyone', $string) . PHP_EOL;
// Обработка HTML-тегов. Удалите все HTML-теги из строки "<p>Hello, <b>world</b>!</p>".
$string = "<p>Hello, <b>world</b>!</p>";
echo strip_tags($string) . PHP_EOL;
// Преобразование регистра. Преобразуйте строку "HeLLo, WorLd!" к нижнему регистру.
$string = "Hello World!";
echo strtolower($string) . PHP_EOL;
// Разбиение строки на подстроки. Разбейте строку "apple,orange,banana" на массив из трех элементов.
$string = "apple,orange,banana";
var_dump(explode(",", $string)) . PHP_EOL;
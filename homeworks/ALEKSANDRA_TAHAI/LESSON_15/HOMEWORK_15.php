<?php
/* 1. Создайте массив из 5 элементов и выведите на экран второй элемент.*/
$array = ['red', 'green', 'blue', 'yellow', 'white'];
print_r($array['2']);
echo PHP_EOL;

/*2. Создайте массив чисел от 1 до 10, найдите сумму элементов массива и выведите на экран, используя функцию array_sum.*/
$arrayOfTen = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arraySum = array_sum($arrayOfTen);
print_r($arraySum);

/* 3. Создайте массив строк, отсортируйте его в алфавитном порядке и выведите на экран.*/
$arrayString = ["hello", "cat", "meow", "moonshine"];
asort($arrayString);
print_r($arrayString);

//4. Создайте двумерный массив и выведите на экран элемент, расположенный во втором ряду и третьем столбце.
$array2 = [
    [1, 8, 70],
    ['hello', 'cat', 'milk']
];
print_r($array2[1][2]);
echo PHP_EOL;

/*5. Создайте ассоциативный массив, где ключами будут названия фруктов, а значениями - их цена в рублях за килограмм. Выведите
на экран цену апельсинов.*/
$arrayDiff = ['apple' => "2000 BYN/kg",
    'orange' => "9000 BYN/kg",
    'banana' => "10 520 BYN/kg",];
print_r($arrayDiff['orange']);
echo PHP_EOL;

/* 6. Найти значение по ключу. Напишите функцию, которая принимает ассоциативный массив и ключ, и возвращает значение, связанное с
этим ключом, если ключ существует, и null в противном случае.*/
function keyExist($array, $key)
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return null;
}

echo keyExist($arrayDiff, 'banana') . PHP_EOL;

/* 7. Поиск наибольшего значения. Напишите функцию, которая принимает ассоциативный массив и возвращает наибольшее
значение из всех значений в массиве.*/
$arrayExample = ['big' => 233, 'bigger' => 392, 'the biggest' => 929229];
function maxValueFromArray($array)
{
    return max($array);
}

echo maxValueFromArray($arrayExample) .PHP_EOL;

/* 8. Сортировка по значениям. Напишите функцию, которая принимает ассоциативный массив и сортирует его по значениям.*/
$sortArrayExample = ['a' => 'aaaaaaaa',
    'c' => 'cccccccc',
    'b' => 'bbbbbbbb'
];
function sortArray(&$array)
{
    asort($array);
}

sortArray($sortArrayExample);
print_r($sortArrayExample);
echo PHP_EOL;

/* 9. У вас есть массив чисел. Напишите функцию, которая принимает этот массив и колбек
функцию в качестве аргументов. Функция должна применить колбек к каждому элементу массива и вернуть
новый массив, содержащий результаты применения колбека к каждому элементу.*/
$arrayNumbers = [1, 554, 755, 125, 3, 987];
function callBack($a)
{
    return $a ** 2;
}

$newArray = array_map('callBack', $arrayNumbers);
print_r($newArray);

/* 10. Создание строк. Создайте переменную $string и присвойте ей значение "Привет, мир!".*/
$newString = "Привет, мир!";
echo $newString . PHP_EOL;

/* 11. Сцепление строк. Создайте переменные $str1 и $str2 и склейте их вместе с помощью оператора ".".*/
$str1 = "hello";
$str2 = "world";
echo $str1 . ", " . $str2 . "!" . PHP_EOL;

/* 12. Извлечение символов из строк. Извлеките символы "w" и "o" из строки "Hello World!".*/
$stringMain = "Hello World!";
$result = str_replace(['W', 'o', 'O'], "", $stringMain);
echo $result . PHP_EOL;

/* 13. Поиск подстроки. Проверьте, содержит ли строка "Hello World!" подстроку "World".*/
$wordResearch = "World";
if (str_contains($stringMain, $wordResearch)) {
    echo "'$stringMain' has substring -  '$wordResearch'" . PHP_EOL;
} else {
    echo "'$stringMain' doesn't have substring -  '$wordResearch'";
}

/*14. Замена подстроки. Замените все вхождения подстроки "world" на "everyone" в строке "Hello world!". */
$stringExample_14 = "Hello world!";
echo str_replace("world", "everyone", $stringExample_14) . PHP_EOL;

/*15. Обработка HTML-тегов. Удалите все HTML-теги из строки "<p>Hello, <b>world</b>!</p>". */
$stringWithTeg = "<p>Hello, <b>world</b>!</p>";
echo strip_tags($stringWithTeg) . PHP_EOL;

/* 16. Преобразование регистра. Преобразуйте строку "HeLLo, WorLd!" к нижнему регистру. */
$stringHelloWorld = "Hello world!";
$stringHelloWorld = strtolower($stringHelloWorld);
echo $stringHelloWorld . PHP_EOL;

/* 17. Разбиение строки на подстроки. Разбейте строку "apple,orange,banana" на массив из трех элементов. */
$stringFruits = "apple,orange,banana";
$arrayFruits = str_getcsv($stringFruits);
print_r($arrayFruits) . PHP_EOL;


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
    'price' => 1000000000000,
    'sort' => 17,
    'quantity' => 1,
];

$newKeys = array_column($products, NULL, 'id');

function addProduct(&$products, $id, $name, $price, $sort = 100, $quantity = 0)
{
    if (in_array($id, array_column($products, 'id'))) {
        return;
    } else {
        $products[] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'sort' => $sort,
            'quantity' => $quantity,
        ];
    }
}

addProduct($products, 100, "lol", 150);

var_dump($products);

echo "5. Отсортировать массив по ключу sort";
usort($products, function ($a, $b) {
    return $a['sort'] <=> $b['sort'];
});
print_r($products);

echo "6. Написать функцию удаления товара по id из массива";
function deleteProductById(&$products, $id)
{
    if (in_array($id, array_column($products, 'id')) === false) {
        return;
    };
    unset($products[$id]);
}

deleteProductById($products, '3');
print_r($products);

echo "7. Усложнить функцию добавления, добавить обновление полей товара если товар с id уже есть, если нет то добавить новый" . PHP_EOL;
function addNewOrUpgrateOldProduct(&$products, $id, $name, $price, $sort, $quantity)
{
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            $products[$key] = ['id' => $id, 'name' => $name, 'price' => $price, 'sort' => $sort, 'quantity' => $quantity];
            return;
        }
    }
    $products[] = ['id' => $id, 'name' => $name, 'price' => $price, 'sort' => $sort, 'quantity' => $quantity];
}

addNewOrUpgrateOldProduct($products, 7, "lol", 150, 250, 600);
print_r($products);


echo "8. Отсортировать массив по 2 ключам: sort и price" . PHP_EOL;
function sortByTwoKeys($a, $b)
{
    if ($a['sort'] !== $b['sort']) {
        return $a['sort'] <=> $b['sort'];
    }
    return $a['price'] <=> $b['price'];
}

usort($products, 'sortByTwoKeys');
print_r($products);

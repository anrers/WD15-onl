<?php

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
    ]
];
// 5. Отсортировать массив по ключу sort
$array_name = [];
foreach ($products as $product => $row) {
    $array_name[$product] = $row['sort'];
}
array_multisort($array_name, SORT_ASC, $products);
print_r($products) . PHP_EOL;
// 6. Написать функцию удаления товара по id из массива
function deleteId($products, $setId)
{
    foreach ($products as $key => $id) {
        if ($id['id'] == $setId) {
            unset($products[$key]);
            print_r($products) . PHP_EOL;
        }
    }
}

deleteId($products, 5);
// 7. Усложнить функцию добавления, добавить обновление полей товара если товар с id уже есть, если нет то добавить новый
echo "Задание 7" . PHP_EOL;
function newProduct(&$products, $id, $name, $price, $sort = 100, $quantity = 0)
{
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            $products[$key] = ['id' => $id, 'name' => $name, 'price' => $price, 'sort' => $sort, 'quantity' => $quantity];
            return;
        }
    }
    $products[] = ['id' => $id,
        'name' => $name,
        'price' => $price,
        'sort' => $sort,
        'quantity' => $quantity];
}

newProduct($products, 5, 2, 2, 2);
print_r($products) . PHP_EOL;
// 8. Отсортировать массив по 2 ключам: sort и price
echo "Задание 8" . PHP_EOL;
$array_value = [];
$array_name1 = [];
foreach ($products as $key => $row) {
    $array_value[$key] = $row['sort'];
    $array_name1[$key] = $row['price'];
}
array_multisort($array_value, SORT_ASC, $array_name1, SORT_DESC, $products);
print_r($products) . PHP_EOL;
//1. Создайте массив из 5 элементов и выведите на экран второй
//элемент.
$newMas = [213, 12412, 214, 124, 124];
echo $newMas[1] . PHP_EOL;
//2. Создайте массив чисел от 1 до 10, найдите сумму элементов
//массива и выведите на экран, используя функцию array_sum.
$newMas10 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$masSecTsk = array_sum($newMas10);
echo $masSecTsk . PHP_EOL;
//3. Создайте массив строк, отсортируйте его в алфавитном порядке и
//выведите на экран.
$masTsk3 = ['A', 'B', 'F', 'G', 'H', 'I', 'J', 'C', 'D', 'E'];
asort($masTsk3);
var_dump($masTsk3) . PHP_EOL;
//4. Создайте двумерный массив и выведите на экран элемент,
//расположенный во втором ряду и третьем столбце.
$masTsk4 = [['a', 'b', 'с'], ['d', 'e', 'f']];
echo $masTsk4[1][2] . PHP_EOL;
//5. Создайте ассоциативный массив, где ключами будут названия
//фруктов, а значениями - их цена в рублях за килограмм. Выведите
//на экран цену апельсинов.
$fruits = array("lemon" => 1, "orange" => 3, "banana" => 5, "apple" => 12);
echo $fruits["orange"] . PHP_EOL;
//6. Найти значение по ключу. Напишите функцию, которая принимает
//ассоциативный массив и ключ, и возвращает значение, связанное с
//этим ключом, если ключ существует, и null в противном случае.
echo "Задача 6" . PHP_EOL;
function getValueByKey($key, $array)
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return null;
}

echo getValueByKey('banana', ["lemon" => 1, "orange" => 3, "banana" => 5, "apple" => 12]) . PHP_EOL;
//7. Поиск наибольшего значения. Напишите функцию, которая
//принимает ассоциативный массив и возвращает наибольшее
//значение из всех значений в массиве.
function getGreatestValueByKey($array)
{
    return max($array);
}

echo getGreatestValueByKey(["lemon" => 1, "orange" => 3, "banana" => 5, "apple" => 12]) . PHP_EOL;
//8. Сортировка по значениям. Напишите функцию, которая принимает
//ассоциативный массив и сортирует его по значениям.
function getSortByKey($array)
{
    echo sort($array);
    var_dump($array);
}

getSortByKey(["lemon" => 1, "orange" => 4, "banana" => 2, "apple" => 12]) . PHP_EOL;
//9. У вас есть массив чисел. Напишите функцию, которая принимает
//этот массив и колбек функцию в качестве аргументов. Функция
//должна применить колбек к каждому элементу массива и вернуть
//новый массив, содержащий результаты применения колбека к
//каждому элементу.
$arrayForChanges = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$callDoubleValue = function ($val) {
    return $val * 2;
};
function doubleArrayValues($arrayForChanges, $callDoubleValue)
{
    $newArray = array_map($callDoubleValue, $arrayForChanges);
    return $newArray;
}

print_r(doubleArrayValues($arrayForChanges, $callDoubleValue)) . PHP_EOL;



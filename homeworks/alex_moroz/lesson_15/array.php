<?php
//1.
$task = "Создайте массив из 5 элементов и выведите на экран второй элемент.";
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
        'name' => 'Product 5',
        'price' => 312,
        'sort' => 13,
        'quantity' => 4,
    ],
    [
        'id' => 7,
        'name' => 'Product 7',
        'price' => 1890.50,
        'sort' => 200,
        'quantity' => 100,
    ],
    [
        'id' => 4,
        'name' => 'Product 4',
        'price' => 140.50,
        'sort' => 200,
        'quantity' => 100,
    ],
    [
        'id' => 19,
        'name' => 'Product 19',
        'price' => 15.15,
        'sort' => 1000,
        'quantity' => 54,
    ]
];

/**
 * Print second element of given array
 * @param array array
 */
function printSecondElementFromArray(array $array)
{
    print_r(getSelectedElementFromArray($array, 2)); // print_r($array[1]);
}

/**
 * Get selected element of given array.
 *
 * @param array array
 * @param int array index plus one (more suit way to user)
 * @return mixed selected element of array
 */
function getSelectedElementFromArray(array $array, int $elementNumber): mixed
{
    return $array[$elementNumber - 1];
}

printTask($task);
printSecondElementFromArray($products);


$task = "Создайте массив чисел от 1 до 10, найдите сумму элементов массива и выведите на экран, используя функцию array_sum.";
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

/**
 * Print array sum.
 *
 * @param array $array
 */
function printArraySum(array $array)
{
    echo(array_sum($array));
}

printTask($task);
printArraySum($array);


$task = "Создайте массив строк, отсортируйте его в алфавитном порядке и выведите на экран.";
$array = ["last", "at least", "tomorrow", "today", "first"];

/**
 * Print sorted array.
 *
 * @param array to sort
 */
function printSortedArray(array &$array)
{
    sort($array);
    print_r($array);
}

printTask($task);
printSortedArray($array);


$task = "Создайте двумерный массив и выведите на экран элемент, расположенный во втором ряду и третьем столбце.";
$array = [
    [1, 2, 3],
    ["at least", "tomorrow", "today", "first"],
    [true, false]
];

function getSelectedElementOfMultidimensionalArray(array $array, int $row, int $column)
{
    return ($array[$row - 1][$column - 1]);
}

function printThirdElementInSecondRowFromMultidimensionalArray(array $array)
{
    print_r(getSelectedElementOfMultidimensionalArray($array, 2, 3));
}

printTask($task);
printThirdElementInSecondRowFromMultidimensionalArray($array);


$task = "Создайте ассоциативный массив, где ключами будут названия фруктов, 
а значениями - их цена в рублях за килограмм. Выведите на экран цену апельсинов.";
$fruitPriceArray = [
    "orange" => 6.99,
    "banana" => 5.69,
    "lemon" => 9.99,
    "apple" => 3.29,
];

function getPriceOfFruit(array $array, string $fruit)
{
    return $array[$fruit];
}

function printOrangePrice(array $array)
{
    echo getPriceOfFruit($array, "orange");
}

printTask($task);
printOrangePrice($fruitPriceArray);

$task = "Найти значение по ключу. Напишите функцию, которая принимает ассоциативный массив и ключ, 
и возвращает значение, связанное с этим ключом, если ключ существует, и null в противном случае.";
function getArrayValueByKey(array $array, string $key)
{
    if (!in_array($key, $array)) {
        return null;
    }
    return $array[$key];
}

$task = "Поиск наибольшего значения. Напишите функцию, которая принимает ассоциативный массив и 
возвращает наибольшее значение из всех значений в массиве.";
function getMaxValueFromArray(array $array)
{
    return max($array);
}

$array = [1, 111, 3, 4, 5, 88, 7, 8, 9, 43];
printTask($task);
echo getMaxValueFromArray($array);


$task = "Сортировка по значениям. Напишите функцию, которая принимает ассоциативный массив и сортирует его по значениям.";
function orderedArrayByValue(&$array)
{
    usort($array, function ($firstElem, $secondElem) {
        return $firstElem <=> $secondElem;
    });
}

printTask($task);
orderedArrayByValue($fruitPriceArray);
print_r($fruitPriceArray);

$task = "У вас есть массив чисел. Напишите функцию, которая принимает этот массив и колбек функцию в качестве аргументов. 
Функция должна применить колбек к каждому элементу массива и вернуть новый массив, содержащий результаты применения колбека 
к каждому элементу.";
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$multiplyItemTwice = fn($item) => $item * 2;

function customCallBackFunction($array, $customCallBackFunction)
{
    return array_map($customCallBackFunction, $array);
}

printTask($task);
print_r(customCallBackFunction($array, $multiplyItemTwice));


$task = "Отсортировать массив по ключу sort";
function orderedProductBySort(&$array)
{
    usort($array, function ($firstProduct, $secondProduct) {
        return $firstProduct['sort'] <=> $secondProduct['sort'];
    });
}

printTask($task);
orderedProductBySort($products);
print_r($products);

$task = "Отсортировать массив по 2 ключам: sort и price";
function orderedProductBySortAndPrice(&$array)
{
    usort($array, function ($firstProduct, $secondProduct) {
        return [$firstProduct['sort'], $firstProduct['price']] <=> [$secondProduct['sort'], $secondProduct['price']];
    });
}

printTask($task);
orderedProductBySort($products);
print_r($products);

$task = "Усложнить функцию добавления, добавить обновление полей товара если товар с id уже есть, если нет то добавить новый";
function addProductToArray(&$array, $id, $name, $price, $sort = 100, $quantity = 0)
{
    if (!in_array($id, array_column($array, 'id'))) {
        $array[] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'sort' => $sort,
            'quantity' => $quantity
        ];
    } else {
        $productIndex = getProductIndexInArrayByProductId($array, $id);
        $element = &$array[$productIndex];
        $element['name'] = $name;
        $element['price'] = $price;
        $element['sort'] = $sort;
        $element['quantity'] = $quantity;
    }
}

printTask($task);
addProductToArray($products, 5, "ProductUpdated", 55.6, 5, 5);
addProductToArray($products, 11, "ProductAdded", 10);
print_r($products);


$task = "Написать функцию удаления товара по id из массива";
function removeProductFromArrayById(&$array, $id)
{
    if (in_array($id, array_column($array, 'id'))) {
        $productIndex = getProductIndexInArrayByProductId($array, $id);
        unset($array[$productIndex]);
    }
}

printTask($task);
removeProductFromArrayById($products, 5);
print_r($products);

function getProductIndexInArrayByProductId($array, $id)
{
    $productIds = array_column($array, 'id');
    return array_search($id, $productIds);
}

function sortProductByField(&$array, $fieldNameToSort)
{
    if (is_string($fieldNameToSort) && array_column($array, $fieldNameToSort)) {
        usort($array, function ($firstProduct, $secondProduct) use ($fieldNameToSort) {
            return $firstProduct[$fieldNameToSort] <=> $secondProduct[$fieldNameToSort];
        });
    }
}

printTask("Without task. Order products by any field. In current example - by field 'price'.");
sortProductByField($products, 'price');
print_r($products);

function printTask(string $task)
{
    echo "<p>$task</p>";
}
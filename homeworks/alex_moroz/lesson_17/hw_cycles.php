<?php
//1. Напишите PHP цикл, который выводит числа от 1 до 100.
$task = "1. PHP цикл, который выводит числа от 1 до 100.";

$indexStart = 1;
$indexEnd = 100;

startTaskExecution($task);
for ($i = $indexStart; $i <= $indexEnd; $i++) {   //possible case to use cycle while, but more preferable to use cycle 'for', when start and end indexes are known, to avoid an endless cycle.
    echo $i . " ";
}
finishTaskExecution();

//2.	Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов.
$task = "2. Вывести ненумерованный список из 10 пунктов.";
$indexStart = 1;
$indexEnd = 10;

startTaskExecution($task);
echo "<ul>";
for ($i = $indexStart; $i <= $indexEnd; $i++) {
    echo "<li>Unordered item $i </li>";
}
echo "</ul>";
finishTaskExecution();

//3.	Создайте массив из 100 случайных чисел.
$task = "3. Массив из 100 случайных чисел.";
$array = [];
$indexStart = 0;
$indexEnd = 100;

for ($i = $indexStart; $i < $indexEnd; $i++) {
    $array[] = rand();
}
assert(count($array) == 100, "Arrays' sizes doesn't match.");

startTaskExecution($task);
print_r($array);
finishTaskExecution();

//4.	Вывести массив из предыдущего задания, при помощи цикла while, а потом при помощи foreach.
$task = "4.	Вывести массив из предыдущего задания, при помощи:";

startTaskExecution($task);
$arraySize = count($array);
$i = 0;

$task = "4.1. цикла while";
startTaskExecution($task);
while ($i < $arraySize) {
    echo $array[$i] . " ";
    $i++;
}
finishTaskExecution();

$task = "4.2. цикла foreach";
startTaskExecution($task);
foreach ($array as $value) {
    echo $value . " ";
}
finishTaskExecution();

finishTaskExecution();

//5.	Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.
$task = "5. Вывести массив из 10 строк внутри HTML-элемента div.";
$array = [
    "some text",
    "other text",
    "text 1",
    "text 2",
    "text 3",
    "text 4",
    "text 5",
    "text 6",
    "text 7",
    "text 8",
];

startTaskExecution($task);
echo "<div>";
foreach ($array as $value) {
    echo $value . " ";
}
echo "</div>";
finishTaskExecution();

//6.	* Создайте массив, каждый элемент которого тоже массив с ключами title, description, price.
// Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.
$task = "6. Создайте вложенный массив, с ключами title, description, price у вложенного массива.
 Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.";
$array = [
    [
        'title' => "Product 1",
        "description" => "Product 1 decription",
        "price" => 15.0,
    ],
    [
        'title' => "Product 2",
        "description" => "Product 2 decription",
        "price" => 55.0,
    ],
    [
        'title' => "Product 3",
        "description" => "Product 2 decription",
        "price" => 65.0,
    ],
    [
        'title' => "Product 4",
        "description" => "Product 2 decription",
        "price" => 35.0,
    ],
    [
        'title' => "Product 5",
        "description" => "Product 5 decription",
        "price" => 45.0,
    ],
];

startTaskExecution($task);
foreach ($array as $item) {
    if (is_array($item)) {
        echo "<h2>{$item["title"]}</h2>";
        echo "<p>{$item["description"]}</p>";
        echo "<a href='#'>{$item["price"]}</a>";
    }
}
finishTaskExecution();

//7. * При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.
$task = "7. При выводе элементов из предыдущего задания покрасьте фон элементов с ценой ниже 40 в желтый цвет.";

startTaskExecution($task);
foreach ($array as $element) {
    if (is_array($element)) {
        $style = $element['price'] < 40 ? "yellow" : "white";
        echo "<div style='background-color: $style;'>";
        echo "<h2>{$element['title']}</h2>";
        echo "<p>{$element['description']}</p>";
        echo "<a href='#'>{$element['price']}</a>";
        echo "</div>";
    }
}
finishTaskExecution();

//8.	Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив
$task = "8. В масcиве из 50 случайных чисел от 0 до 100, найти все числа меньшие 72, поместить их в отдельный массив.";

$array = [];
for ($i = 0; $i < 50; $i++) {
    $array[] = rand(0, 100);
}

$arrayWithNumbersLessThan72 = []; // to avoid Uncaught TypeError if initial array doesn't contain number less than 72
foreach ($array as $value) {
    if ($value < 72) {
        $arrayWithNumbersLessThan72[] = $value;
    }
}

$arrayWithNumbersLessThan72_2 = array_filter($array, fn($n) => $n < 72); //easier way to get new array with numbers that less than 72

assert(count($arrayWithNumbersLessThan72) == count($arrayWithNumbersLessThan72_2), "Arrays sizes don't match.");
assert([] == array_diff($arrayWithNumbersLessThan72, $arrayWithNumbersLessThan72_2), "Arrays don't match.");

startTaskExecution($task);
print_r($arrayWithNumbersLessThan72);
finishTaskExecution();

//9.	Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).
$task = "9. Вывести числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).";


startTaskExecution($task);
for ($i = 0; $i <= 100; $i++) {
    $color = (isIndexOdd($i)) ? "lightgray" : "yellow";
    echo "<div style='background-color: " . $color . "'>". $i. "</div>";
}
finishTaskExecution();

//Additional functions
function isIndexOdd($var): bool
{
    // returns whether the input integer is odd
    return ($var & 1); //other way to check is number odd $i % 2 != 0
}

function addHtmlTagsToTask($task): string
{
    return "<details>
                <summary>$task</summary>
                    <p>";
}

function startTaskExecution($task)
{
    echo addHtmlTagsToTask($task);
}

function finishTaskExecution()
{
    echo "</p></details>";
}

<?php
//1.	Напишите PHP цикл, который выводит числа от 1 до 100.
for ($i = 1; $i <= 100; $i++) {
    echo $i . "<br>";
}

//2.	Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов.
echo "<ul>";
for ($i = 1; $i <= 10; $i++) {
    echo "<li>Пункт $i</li>";
}
echo "</ul>";

//3.	Создайте массив из 100 случайных чисел.
$randomNumbers = [];
for ($i = 0; $i < 100; $i++) {
    $randomNumbers[] = rand(0, 10000);
}

//4.	Вывести массив из предыдущего задания, при помощи цикла while.
$i = 0;
while ($i < count($randomNumbers)) {
    echo $randomNumbers[$i] . "<br>";
    $i++;
}

//4.1.	Вывести массив из предыдущего задания, при помощи foreach.
foreach ($randomNumbers as $number) {
    echo $number . "<br>";
}

//5.	Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.
$strings = ["Строка 1", "Строка 2", "Строка 3", "Строка 4", "Строка 5", "Строка 6", "Строка 7", "Строка 8", "Строка 9", "Строка 10"];
echo "<div>";
foreach ($strings as $string) {
    echo "<p>$string</p>";
}
echo "</div>";

//6.	* Создайте массив, каждый элемент которого тоже массив с ключами title, description, price. Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.
$products = [
    ["title" => "Товар 1", "description" => "Описание 1", "price" => 100],
    ["title" => "Товар 2", "description" => "Описание 2", "price" => 200],
    ["title" => "Товар 3", "description" => "Описание 3", "price" => 300]
];

foreach ($products as $product) {
    echo "<h2>{$product['title']}</h2>";
    echo "<p>{$product['description']}</p>";
    echo "<a href='#'>{$product['price']} руб.</a>";
}

//7.	* При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.
foreach ($products as $product) {
    $style = $product['price'] < 150 ? "background-color: lightcoral;" : "background-color: lightgreen;";
    echo "<div style='$style'>";
    echo "<h2>{$product['title']}</h2>";
    echo "<p>{$product['description']}</p>";
    echo "<a href='#'>{$product['price']} руб.</a>";
    echo "</div>";
}

//8.	Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив
$numbers = [];
for ($i = 0; $i < 50; $i++) {
    $numbers[] = rand(0, 100);
}

$less72 = [];
foreach ($numbers as $number) {
    if ($number < 72) {
        $less72[] = $number;
    }
}

print_r($less72);

//9.	Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).
for ($i = 0; $i <= 100; $i++) {
    $style = $i % 2 == 0 ? "background-color: lightgray;" : "background-color: white;";
    echo "<div style='$style'>$i</div>";
}

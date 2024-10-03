<?php
// Напишите PHP цикл, который выводит числа от 1 до 100.
for ($i = 1; $i <= 100; $i++) {
    echo $i . ' ';
}
// Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов. 
echo "<ul>\n";
for ($i = 1; $i <= 10; $i++) {
    echo "<li>Пункт $i</li>" . PHP_EOL;
}
echo "</ul>";
// Создайте массив из 100 случайных чисел.
// Вывести массив, при помощи цикла while, а потом при помощи foreach. 
$randomNumbers = [];

for ($i = 0; $i < 100; $i++) {
    $randomNumbers[] = rand();
}

$index = 0;
while ($index < count($randomNumbers)) {
    echo $randomNumbers[$index] . PHP_EOL;
    $index++;
}

foreach ($randomNumbers as $randomNumber) {
    echo $randomNumber . PHP_EOL;
}
// Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.
$arrayStrings = [
    'Создайте',
    'массив',
    'из',
    '10',
    'строк',
    'и',
    'выведите',
    'их',
    'любым',
    'циклом',
    'внутри',
];
echo "<div>\n";
foreach ($arrayStrings as $string) {
    echo $string . ' ';
}
echo "\n</div>";
// * Создайте массив, каждый элемент которого тоже массив с ключами title, description, price. 
// Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке. 
$array = [
    ["title" => "Product 1", "description" => "Description product 1", "price" => 1],
    ["title" => "Product 2", "description" => "Description product 2", "price" => 2],
    ["title" => "Product 3", "description" => "Description product 3", "price" => 3],
];
foreach ($array as $value) {
    echo "<h2>{$value["title"]}</h2>" . PHP_EOL;
    echo "<p>{$value["description"]}</p>" . PHP_EOL;
    echo "<a href='#'>{$value["price"]}</a>" . PHP_EOL;
};
// * При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.
$priceLimit = 2;
foreach ($array as $value) {
    if ($value['price'] < $priceLimit) {
        $backgroundColor = 'style="background-color: ivory;"';
        echo "<div $backgroundColor>" . PHP_EOL;
        echo "<h2>{$value["title"]}</h2>" . PHP_EOL;
        echo "<p>{$value["description"]}</p>" . PHP_EOL;
        echo "<a href='#'>{$value["price"]}</a>" . PHP_EOL;
        echo "</div>" . PHP_EOL;
    } else {
        echo "<h2>{$value["title"]}</h2>" . PHP_EOL;
        echo "<p>{$value["description"]}</p>" . PHP_EOL;
        echo "<a href='#'>{$value["price"]}</a>" . PHP_EOL;
    }
};
// Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив
$randomNum = [];

for ($i = 0; $i < 50; $i++) {
    $randomNum[] = rand(0, 100);
};

$lessThen72 = array_filter($randomNum, function($num) {
    return $num < 72;
});
// Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»).
echo "<div>\n";
for ($i = 0; $i <= 100; $i++) {
    echo ($i % 2 == 0) 
    ? ("<p style='background-color: ivory;'></p>" . PHP_EOL) 
    : ("<p style='background-color: #4285B4;'></p>" . PHP_EOL);
};
echo "</div>";
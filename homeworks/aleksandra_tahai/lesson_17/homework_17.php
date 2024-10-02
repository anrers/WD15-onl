<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework 17</title>
</head>
<body>
<?php
//1.  Напишите PHP цикл, который выводит числа от 1 до 100.

for ($i = 1; $i <= 100; $i++) {
    echo $i . PHP_EOL;
}
?>
<ul> <?php
    //2.  Напишите PHP цикл, который выводит ненумерованный список из 10 пунктов.
    for ($li = 1; $li <= 10; $li++) {
        echo "<li> $li пункт </li>" . PHP_EOL;
    }
    ?>
</ul>

<?php
//3.  Создайте массив из 100 случайных чисел.
for ($counter = 1; $counter <= 100; $counter++) {
    $array[] = rand();
}
print_r($array);
?>

<?php
//4.  Вывести массив из предыдущего задания, при помощи цикла while, а потом при помощи foreach.
$number = 0;
while ($number < count($array)) {
    print_r($array[$number]);
    echo " ";
    $number++;
}
echo PHP_EOL;
foreach ($array as $value) {
    print_r($value);
    echo " ";
}

foreach ($array as $value) {
    echo " $value";
}
?>

<div>
    <?php
    //<!--5.  Создайте массив из 10 строк и выведите их любым циклом внутри HTML-элемента div.-->
    $arrayOfString = ['hello', 'my', 'dear', 'friend', 'how', 'are', 'you?', 'hahanki', 'hohonki', 'the end'];
    foreach ($arrayOfString as $value) {
        echo "<p>$value</p>" . PHP_EOL;
    }
    ?>
</div>

<?php
//6.  * Создайте массив, каждый элемент которого тоже массив с ключами title, description, price.
// Выведите все элементы этого массива, так, чтобы заголовки были в HTML-элементе h2, описания в p, а цена в гиперсылке.
$arrayOfValues = [
    [
        'title' => 'title 1',
        'description' => 'description 1',
        'price' => 100,
    ],
    [
        'title' => 'title 2',
        'description' => 'description 2',
        'price' => 200,
    ]
];

foreach ($arrayOfValues as $values) {
    echo "<h2>{$values['title']}</h2>" . PHP_EOL;
    echo "<p>{$values['description']}</p>" . PHP_EOL;
    echo "<a>{$values['price']}</a>" . PHP_EOL;
}
?>

<?php
//7.  * При выводе элементов из предыдущего задания покрасьте фон элементов ниже определенной цены в отличный от других цвет.
foreach ($arrayOfValues as $values) {
    $color = ($values['price'] > 100) ? "red" : "green";
    echo "<h2 style='background-color: $color>{$values['title']}</h2>" . PHP_EOL;
    echo "<p style='background-color: $color>{$values['description']}</p>" . PHP_EOL;
    echo "<a style='background-color: $color>{$values['price']}</a>" . PHP_EOL;
}
?>

<?php
//8.  Создайте масcив из 50 случайных чисел от 0 до 100. Найти все числа меньшие 72 и поместить их в отдельный массив
$newArray = [];
while (count($newArray) !== 50) {
    $newArray[] = rand(0, 100);
}
print_r($newArray);

$newArrayOfNewValues = [];
foreach ($newArray as $value) {
    if ($value < 72) {
        $newArrayOfNewValues[] = $value;
    }
}
print_r($newArrayOfNewValues);
?>

<?php
//9.  Создайте цикл, который выводит числа то 0 до 100 в HTML-элементах div; окраска HTML-элементов должна чередоваться («зебра»)
for ($number = 0; $number <= 100; $number++) {
    $color=($number % 2 == 0)? "white" : "black";
    echo "<div style='background-color:$color'>$number</div>" . PHP_EOL;
}
?>

</body>
</html>
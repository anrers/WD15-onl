<?php
echo "<b>Задача 1. Создайте массив из 5 элементов и выведите на экран второй элемент</b><br>";
$arrayOfFiveElements = ["Первый", "Петрович", "третий", "Федя", "Восемь"];
echo "Второй по счету элемент: " . $arrayOfFiveElements[1] . "<br>";
echo "<br>";

echo "<b>Задача 2. Создайте массив чисел от 1 до 10, найдите сумму элементов 
массива и выведите на экран, используя функцию array_sum.</b><br>";
$arr10Elements = range(1, 10);
echo "Сумма элементов массива равна " . array_sum($arr10Elements) . "<br>";
echo "<br>";

echo "<b>Задача 3. Создайте массив строк, отсортируйте его в алфавитном порядке и 
выведите на экран.</b><br>";
$arrayString = ["Это", "массив", "из", "строк", "которые", "нужно", "разместить", "в", "алфавитном", "порядке"];
asort($arrayString);
print_r($arrayString);
echo "<br>";
echo "<br>";

echo "<b>Задача 4. Создайте двумерный массив и выведите на экран элемент, 
расположенный во втором ряду и третьем столбце.</b><br>";
$multidimensionalArray = [
    [1, 2, 3, 4, 5, 6, 7, 8, 9],
    ["Поиск наибольшего значения", "Напишите функцию", " Вот это", "Удалите все HTML", "Разбиение строки на подстроки"],
    [5, "59", 24, "56", 125],
];
echo "Во втором ряду и третьем столбце находится: " . $multidimensionalArray[1][2] . "<br>";
echo "<br>";

echo "<b>Задача 5.  Создайте ассоциативный массив, где ключами будут названия 
фруктов, а значениями - их цена в рублях за килограмм. Выведите 
на экран цену апельсинов.</b><br>";
$fruitPrice = ["Бананы" => 129.99, "Яблоки" => 171.29, "Апельсины" => 169.99, "Мандарины" => 219.99, "Груши" => 225.78];
echo "Стоимость апельсинов: " . $fruitPrice["Апельсины"] . " " . "рублей <br>";
echo "<br>";

echo "<b>Задача 6. Найти значение по ключу. Напишите функцию, которая принимает 
ассоциативный массив и ключ, и возвращает значение, связанное с 
этим ключом, если ключ существует, и null в противном случае.</b><br>";
function findSomething($arr, $key)
{
    if (array_key_exists($key, $arr)) {
        return $arr[$key];
    } else {
        return null;
    }
}

//Проверка
echo findSomething($fruitPrice, "Мандарины");
echo findSomething($fruitPrice, "Виноград") . "<br>";
echo "<br>";


echo "<b>Задача 7. Поиск наибольшего значения. Напишите функцию, которая 
принимает ассоциативный массив и возвращает наибольшее 
значение из всех значений в массиве.</b><br>";
function findMaxArray($arr)
{
    return max($arr);
}

//Проверка
echo findMaxArray($fruitPrice) . "<br>";
$assArrayString = ["ложка" => "вилка", "красное" => "белое", "синее" => "зеленое"];
echo findMaxArray($assArrayString);
echo "<br>";


echo "<b>Задача 8. Сортировка по значениям. Напишите функцию, которая принимает 
ассоциативный массив и сортирует его по значениям.</b><br>";
function arraySort($array)
{
    arsort($array);
    var_dump($array);
    echo "<br>";
}

//Проверка
arraySort($assArrayString);
echo "<br>";

echo "<b>Задача 9. У вас есть массив чисел. Напишите функцию, которая принимает 
этот массив и колбек функцию в качестве аргументов. Функция 
должна применить колбек к каждому элементу массива и вернуть 
новый массив, содержащий результаты применения колбека к 
каждому элементу.</b><br>";

$arrayNum = [1, 7, 18, 24, 42, 11, 187, 524, 3];
$callBackFunction = function ($val) {
    return $val ** 2;
};

function wellLetsTry($arr, $callBackFunction): array
{
    $result = [];
    for ($i = 0; $i < count($arr); $i++) {
        $a = $callBackFunction($arr[$i]);
        $result[] = $a;
    }
    return $result;
}

$result2 = wellLetsTry($arrayNum, $callBackFunction);
var_dump($result2);
echo "<br>";
echo "<br>";

echo "<b>Задача 10. Создание строк. Создайте переменную string и присвойте ей 
значение Привет, мир!.</b><br>";
$string = "Привет, мир!.";
echo $string . "<br>";
echo "<br>";

echo "<b>Задача 11. Сцепление строк. Создайте переменные str1 и str2 и склейте 
их вместе с помощью оператора \".\"</b><br>";
$str1 = "Первая строка ";
$str2 = "сцепляется со второй строкой";
echo $str1 . $str2 . "<br>";
echo "<br>";

echo "<b>Задача 12. Извлечение символов из строк. Извлеките символы \"w\" и \"o\" из 
строки \"Hello World!\".</b><br>";
//Непонятно, чего надо сделать, поэтому:
$str3 = "Hello World!";
echo $str3[6] . "<br>";
echo $str3[7] . "<br>";
$litters = ['w', 'W', 'o'];
$str4 = str_replace($litters, '', $str3);
echo $str4 . "<br>";
echo "<br>";

echo "<b>Задача 13. </b>Поиск подстроки. Проверьте, содержит ли строка \"Hello World!\" 
подстроку \"World\".<br>";
$helloWorld = "Hello World!";
$patsStr = "World";
if (stripos($helloWorld, $patsStr) !== false) {
    echo "Подстрока $patsStr содержится в строке $helloWorld <br>";
} else {echo "Подстрока $patsStr не содержится в строке $helloWorld <br>";}
echo "<br>";

echo "<b>Задача 14. </b>Замена подстроки. Замените все вхождения подстроки \"world\" 
на \"everyone\" в строке \"Hello world!\".<br>";
$helloWorld2 = "Hello world!";
$helloEveryone = str_replace('world', 'everyone', $helloWorld2);
echo $helloEveryone . "<br>";
echo "<br>";


echo "<b>Задача 15.  Обработка HTML-тегов. Удалите все HTML-теги из строки </b><br>";
//'<p>Hello, <b>world</b>!</p>'.
echo strip_tags("<p>Hello, <b>world</b>!</p>") . "<br>";
echo "<br>";

echo "<b>Задача 16. Преобразование регистра. Преобразуйте строку \"HeLLo, 
WorLd!\" к нижнему регистру.</b><br>";
$clumsyHelloWorld = "HeLLo, WorLd!";
$goodHelloWorld = strtolower($clumsyHelloWorld);
echo $goodHelloWorld . "<br>";
echo "<br>";

echo "<b>Задача 17. </b>Разбиение строки на подстроки. Разбейте строку 
\"apple,orange,banana\" на массив из трех элементов.<br>";
$fruitString = "apple,orange,banana";
$fruitStringArr = explode(',', $fruitString);
print_r($fruitStringArr);






<?php
var_dump($_POST);

$ages = $_POST['age'];
$numbers = $_POST['number'];

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form action="" method="post" style="display:flex; row-gap: 10px; flex-direction: column; padding-top: 20px">
        <label for="age">Your age:</label>
        <input class="age" name="age" style="width:300px;">
        <?php
        //if
        //1) Напишите программу, которая выводит на экран сообщение в
        //зависимости от возраста пользователя:
        //Если возраст меньше 18 лет, выведите "Вы несовершеннолетний"
        //Если возраст больше, или равен 18 и меньше, либо равно 65 лет,
        //выведите "Вы взрослый"
        //Если возраст больше 65 лет, выведите "Вы пенсионер"
        if (is_numeric($ages)) {
            if ($ages < 18 && $ages >= 0) {
                echo "<p>$ages - Вы несовершеннолетний </p>";
            } elseif ($ages >= 18 && $ages <= 65) {
                echo "<p>$ages - Вы взрослый</p>";
            } elseif ($ages > 65) {
                echo "<p>$ages - Вы пенсионер</p>";
            } else {
                echo "<p>$ages - ху ю а???</p>";
            }
        } else {
            echo "<p style='color:red'>$ages - it's not a number!</p>";
        } ?>

        <label for="number">Your number:</label>
        <input class="number" name="number" style="width:300px;">
        <?php
        //if
        //2) Напишите программу, которая проверяет, является ли введенное
        //пользователем число четным или нечетным, и выводит соответствующее
        //сообщение:
        //Если число четное, выведите "Число является четным"
        //Если число нечетное, выведите "Число является нечетным
        if (is_numeric($numbers)) {
            $test = ($numbers % 2 == 0) ? "Число является четным" : "Число является нечетным";
            echo "<p style='color:green'>$numbers - $test</p>";
        } else {
            echo "<p style='color:red'>$numbers - it's not a number!</p>";
        } ?>
        <input name="submit" type="submit" style="width:300px;">
    </form>
    </body>
    </html>

<?php
//switch
//1) Напишите программу, которая выводит на экран сообщение в
//зависимости от значения переменной $dayOfWeek (от 1 до 7), которая
//содержит номер дня недели.
function whatIsADay($dayOfWeek)
{
    switch ($dayOfWeek) {
        case 1:
            echo "Monday";
            break;
        case 2:
            echo "Tuesday";
            break;
        case 3:
            echo "Wednesday";
            break;
        case 4:
            echo "Thursday";
            break;
        case 5:
            echo "Friday";
            break;
        case 6:
            echo "Saturday";
            break;
        case 7:
            echo "Sunday";
            break;
        default:
            echo "...";
            break;
    }
}

whatIsADay(3);

//2) Напишите программу, которая определяет количество дней в месяце в
//зависимости от значения переменной $month (от 1 до 12), которая
//содержит номер месяца:
//Если $month равно 2, выведите "В этом месяце 28 дней"
//Если $month равно 4, 6, 9 или 11, выведите "В этом месяце 30 дней"
//Во всех остальных случаях выведите "В этом месяце 31 день"
function howDaysInMonth($month)
{
    if (!is_numeric($month) || $month < 1 || $month > 12) {
        echo "it isn't valid data!";
    } else {
        switch ($month) {
            case 2:
                echo "В этом месяце 28 дней";
                break;
            case 4:
            case 6:
            case 9:
                echo "В этом месяце 30 дней";
                break;
            default:
                echo "В этом месяце 31 день";
                break;
        }
    }
}

howDaysInMonth(20000);

//Match
//1) Напишите программу, которая принимает на вход строку, и определяет,
//является ли она палиндромом (т.е. читается одинаково в обоих
//направлениях), используя конструкцию match и функцию strrev:
$string = "level";

function palindromeCheck($string)
{
    $stringCheck = strrev($string);
    $result = match ($stringCheck) {
        $stringCheck => "$string - is a palindrome!",
        default => "$string - is not a palindrome!",
    };
    echo $result;
}

palindromeCheck($string);

//2) Напишите программу, которая принимает на вход число, и определяет,
//является ли оно четным, кратным 3 или кратным 5, используя
//конструкцию match:
$number = 15;

$result = match (true) {
    $number % 3 === 0 && $number % 5 === 0 => "$number - кратно 3 and 5!",
    $number % 2 === 0 => "$number - четное!",
    $number % 3 === 0 => "$number - кратно 3!",
    $number % 5 === 0 => "$number - кратно 5!",
    default => "не работает"
};
echo $result;

//while
//1) Задача на поиск суммы нечетных чисел от 1 до N:
$num = 10;
$sum = 0;
$i = 1;
while ($i < $num) {
    $i++;
    $sum = ($i % 2 !== 0) ? $sum + $i : $sum;
}
echo $sum . PHP_EOL;

//2) Задача на поиск первого положительного числа, кратного 7:
$i = 1;
while (true) {
    $i++;
    if ($i % 7 == 0 && $i > 0) {
        echo "$i - первое положительное число кратное 7!" . PHP_EOL;
        break;
    }
}

//for
//1) Поиск суммы элементов массива:
$numbers = [1, 2, 3, 4, 5];
$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}
echo $sum . PHP_EOL;

//2) Собрать массив четных чисел из входного массива:
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];
for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 == 0) {
        $evenNumber[] = $numbers[$i];
    }
}
print_r($evenNumber);

//foreach
//1) Добавить новый элемент в ассоциативный массив и вывести все значения данного массива
$array = [
    'heh' => "hehex",
    'yuy' => "yuyuy",
    'jhu' => "jhgg",
];
$array['jiji'] = "hugfg";

foreach ($array as $value) {
    echo $value . PHP_EOL;
}

//2) Объединить нескольких ассоциативных массивов в один и вывести результат (ключ, значение), через foreach
$arrayTwo = [
    'oliki' => "kroliki",
    'toliki' => "loliki",
];
$arraySum = array_merge($array, $arrayTwo);
foreach ($arraySum as $key => $value) {
    echo "$key => $value" . PHP_EOL;
}
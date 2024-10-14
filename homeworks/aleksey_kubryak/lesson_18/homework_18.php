<!-- if
1) Напишите программу, которая выводит на экран сообщение в зависимости от возраста пользователя:
Если возраст меньше 18 лет, выведите "Вы несовершеннолетний"
Если возраст больше, или равен 18 и меньше, либо равно 65 лет, выведите "Вы взрослый"
Если возраст больше 65 лет, выведите "Вы пенсионер"-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>
    <form method="get">
        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["age"])) {
        $age = intval($_GET["age"]);

        if ($age < 18) {
            echo "<p>Вы несовершеннолетний</p>";
        } elseif ($age >= 18 && $age <= 65) {
            echo "<p>Вы взрослый</p>";
        } else {
            echo "<p>Вы пенсионер</p>";
        }
    }
    ?>
</body>
</html>

<!-- 2) Напишите программу, которая проверяет, является ли введенное пользователем число четным или нечетным, 
и выводит соответствующее сообщение:
Если число четное, выведите "Число является четным"
Если число нечетное, выведите "Число является нечетным" -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Even or Odd</title>
</head>
<body>
    <form method="get">
        <label for="num">Enter your number:</label>
        <input type="number" id="num" name="num" required>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["num"])) {
        $num = intval($_GET["num"]);
        
        if ($num % 2 == 0) {
            echo "<p>Число является четным</p>";
        } else {
            echo "<p>Число является нечетным</p>";
        }
    }
    ?>
</body>
</html>

<!-- switch
1) Напишите программу, которая выводит на экран сообщение в зависимости от значения переменной $dayOfWeek (от 1 до 7), 
которая содержит номер дня недели.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day of week</title>
</head>
<body>
    <form method="get">
        <label for="numDay">Enter day of week:</label>
        <input type="number" id="numDay" name="numDay" required>
        <input type="submit" value="Submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["numDay"])) {
            $dayOfWeek = intval($_GET["numDay"]);

            switch ($dayOfWeek) {
                case 1:
                    echo "<p>Понедельник</p>";
                    break;
                case 2:
                    echo "<p>Вторник</p>";
                    break;
                case 3:
                    echo "<p>Среда</p>";
                    break;
                case 4:
                    echo "<p>Четверг</p>";
                    break;
                case 5:
                    echo "<p>Пятница</p>";
                    break;
                case 6:
                    echo "<p>Суббота</p>";
                    break;
                case 7:
                    echo "<p>Воскресенье</p>";
                    break;
                default:
                    echo "<p>Неверный номер дня недели</p>";
                    break;
            }
        }
    ?>
</body>
</html>
<!-- 2) Напишите программу, которая определяет количество дней в месяце в зависимости от значения переменной $month (от 1 до 12), 
которая содержит номер месяца:
Если $month равно 2, выведите "В этом месяце 28 дней"
Если $month равно 4, 6, 9 или 11, выведите "В этом месяце 30 дней"
Во всех остальных случаях выведите "В этом месяце 31 день" -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days in a month</title>
</head>
<body>
    <form method="get">
        <label for="numMonth">Enter number of month:</label>
        <input type="number" id="numMonth" name="numMonth" required>
        <input type="submit" value="Submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["numMonth"])) {
            $month = intval($_GET["numMonth"]);

            switch ($month) {
                case 2:
                    echo "<p>В этом месяце 28 дней (в високосный год 29 дней)</p>";
                    break;
                case 4:
                case 6:
                case 9:
                case 11:
                    echo "<p>В этом месяце 30 дней</p>";
                    break;
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    echo "<p>В этом месяце 31 день</p>";
                    break;
                default:
                    echo "<p>Неверный номер месяца</p>";
                    break;
            }
        }
    ?>
</body>
</html>
<!-- Match
1) Напишите программу, которая принимает на вход строку, и определяет, является ли она палиндромом (т.е. читается одинаково в 
обоих направлениях), используя конструкцию match и функцию strrev:
$string = "level";-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome check</title>
</head>
<body>
    <form method="get">
        <label for="word">Enter word:</label>
        <input type="text" id="word" name="word" value="level" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["word"])) {
        $string = $_GET["word"];

        $result = match ($string === strrev($string)) {
            true => "Строка '{$string}' является палиндромом.",
            false => "Строка '{$string}' не является палиндромом."
        };

        echo "<p>$result</p>";
    }
    ?>
</body>
</html>
<!-- 2) Напишите программу, которая принимает на вход число, и определяет, является ли оно четным, кратным 3 или кратным 5, 
используя конструкцию match:
$number = 15;
$result = match (true) {
};
echo $result; -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome check</title>
</head>
<body>
    <form method="get">
        <label for="num">Enter number:</label>
        <input type="number" id="num" name="num" value="15" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["num"])) {
        $number = $_GET["num"];

        $result = match (true) {
            $number % 2 === 0 && $number % 3 === 0 => "Число {$number} чётное и кратно 3",
            $number % 2 === 0 && $number % 5 === 0 => "Число {$number} чётное и кратно 5",
            $number % 3 === 0 => "Число {$number} кратно 3",
            $number % 5 === 0 => "Число {$number} кратно 5",
            $number % 2 === 0 => "Число {$number} чётное",
            default => "Число {$number} не подходит под условия задачи"
        };

        echo "<p>$result</p>";
    }
    ?>
</body>
</html>
<!-- while
1) Задача на поиск суммы нечетных чисел от 1 до N:
$num = 10;
$sum = 0;
$i = 1; -->
<?php
$num = 10;
$sum = 0;
$i = 1;

while ($i <= $num) {
    if ($i % 2 !== 0) {
        $sum += $i;
    }
    $i++;
}

echo "Сумма нечетных чисел от 1 до $num равна $sum";
?>
<!-- 2) Задача на поиск первого положительного числа, кратного 7:
$i = 1;
while (true) {
} -->
<?php
$i = 1;

while (true) {
    if ($i > 0 && $i % 7 == 0) {
        echo "Первое положительное число, кратное 7: $i";
        break;
    }
    $i++;
}

?>
<!-- for
1) Поиск суммы элементов массива:
$numbers = [1, 2, 3, 4, 5];
$sum = 0;-->
<?php
$numbers = [1, 2, 3, 4, 5];
$sum = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}

echo "Сумма элементов массива равна: $sum";
?>
<!-- 2) Собрать массив четных чисел из входного массива:
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];-->
<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = [];

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 == 0) {
        $evenNumbers[] = $numbers[$i];
    };
}

print_r($evenNumbers);
?>
<!--foreach
1) Добавить новый элемент в ассоциативный массив и вывести все значения данного массива-->
<?php
$footballSpain = [
    "Real Madrid" => "Santiago Bernabeu",
    "FC Barcelona" => "Camp Nou",
    "Athletic Bilbao" => "San Mamés",
    "Atletico Madrid" => "Metropolitano"
];
$footballSpain["Sevilla FC"] = "Ramón Sánchez Pizjuán";
foreach ($footballSpain as $key => $value) {
    echo "{$key}: {$value}" . PHP_EOL;
};
?>
<!--2) Объединить нескольких ассоциативных массивов в один и вывести результат (ключ, значение), через foreach -->
<?php
$arrayOne = [
    "Real Madrid" => "Santiago Bernabeu",
    "FC Barcelona" => "Camp Nou"
];

$arrayTwo = [
    "Atletico Madrid" => "Metropolitano",
    "Sevilla FC" => "Ramón Sánchez Pizjuán"
];

$arrayThree = [
    "Athletic Bilbao" => "San Mamés",
    "Valencia CF" => "Mestalla"
];

$mergedArray = array_merge($arrayOne, $arrayTwo, $arrayThree);

foreach ($mergedArray as $key => $value) {
    echo "{$key}, {$value}" . PHP_EOL;
};
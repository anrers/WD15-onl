<?php   

//1st task
$age = 65;

function ageCheck ($age) {
    if ($age < 18) {
        return "Вы несовершеннолетний\n";
    } elseif ($age >= 18 && $age <= 65) {
        return "Вы взрослый\n";
    } else {
        return "Вы пенсионер\n";
    }
}

$result = ageCheck($age);
print_r($result);

//2nd task

$number = 10;

function numberCheck (int $number) {
    if ($number % 2 == 0) {
        return "Число является четным\n";
    } else {
        var_dump($number);
        return "Число является нечетным\n";
    }
}

$result1 = numberCheck($number);
print_r($result1);

//3rd task

$day = 4;

switch ($day) {
    case 1:
        echo "Понедельник\n";
        break;
    case 2:
        echo "Вторник\n";
        break;
    case 3:
        echo "Среда\n";
        break;
    case 4:
        echo "Четверг\n";
        break;
    case 5:
        echo "Пятница\n";
        break;
    case 6:
        echo "Суббота\n";
        break;
    case 7:
        echo "Воскресенье\n";
        break;
    default:
        echo "Некорректный номер дня недели\n";
}

//4th task

$month = 10;

switch ($month) {
    case 2:
        echo "В этом месяце 28 дней\n";
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        echo "В этом месяце 30 дней\n";
        break;
    default:
        echo "В этом месяце 31 день\n"; 
}

//5th task

$string = "leved";

$stringToLowerCase = strtolower($string);

$isPalindrome = match ($stringToLowerCase === strrev($stringToLowerCase)) {
    true => "Строка является палиндромом",
    false => "Строка не является палиндромом"
};

echo $isPalindrome . "\n";

//6th task

$int = 15;                                                                          ;

$result = match (true) {
    $int % 2 === 0 => "Число четное",
    $int % 3 === 0 => "Число кратно 3",
    $int % 5 === 0 => "Число кратно 5",
    default => "Число не является четным, кратным 3 или кратным 5",
};

echo $result . "\n";

//7th task

$num = 15;
$sum = 0;
$i = 1;

while ($i <= $num) {
    if ($i % 2 !== 0) {
        $sum += $i;
        var_dump($sum);
    }
    $i++;
}

echo "Сумма нечётных чисел от 1 до $num равна: $sum\n";

//8th task

$i = 1;

while (true) {
    if ($i % 7 === 0) {
        echo "Первое положительное число, кратное 7: $i\n";
        break;
    }
    $i++;
}

//9th task

$numbers = [1, 2, 3, 4, 5, ];
$sum = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}

print_r("$sum \n");

//10th task

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; 
$evenNumbers = [];

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] % 2 === 0) {
        $evenNumbers[] = $numbers[$i];
    }
} 

print_r($evenNumbers);

//11th task

$dog = [
    'name' => "Morty",
    'age' => 2,
    'breed' => 'Labradoodle',
];

$dog['size'] = 'large';

foreach ($dog as $key => $value) {
    print_r("$key: $value\n");
}

//12th task

$dog = [
    'name' => "Morty",
    'age' => 2,
    'breed' => 'Labradoodle',
];

$secondArray = [
    'favorite toy' => "Mr Pickles",
    'color' => "brown",
    'speed' => 25,
];

$result = $dog + $secondArray;

foreach ($result as $key => $value) {
    print_r("$key: $value\n");
}

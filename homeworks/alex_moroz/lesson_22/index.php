<?php

require_once 'src/Car.php';
$car = new Car('Ford', 'Expedition', 'black', 2024);

require_once 'src/Circle.php';
$circle = new Circle(15);

require_once 'src/Person.php';
$person = new Person('Homer', 38, 'male');

require_once 'src/Student.php';
$student = new Student('Van', 'Wilder', 24, 2);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HW 22</title>
</head>
<body>
<h2>Вывести всю информацию о студенте: имя, фамилия, возраст, курс.</h2>
<?php $student->printStudentInfo() ?>

<h2>Вывести информацию об автомобиле: марка, модель, цвет и год.</h2>
<?php $car->printCarInfo() ?>

<h2>Найти площадь круга.</h2>
<?php echo 'Площадь круга: ' . $circle->calculateArea() ?>

<h2>Проверить, совершеннолетний ли человек.</h2>
<?php echo ($person->isAdult()) ? 'Совершеннолетний.' : 'Нет 18 лет.' ?>
</body>
</html>

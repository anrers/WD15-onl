<?php

require_once 'Vehicle.php';
require_once 'Car.php';
require_once 'Motorcycle.php';

// Создаем экземпляры транспортных средств
$car = new Car('220 км/ч', 'Toyota', '1500 кг', 4);
$motorcycle = new Motorcycle('180 км/ч', 'Yamaha', '200 кг', 'Спорт');

$car->start();
$car->honk();
$car->stop();

echo "\n";

$motorcycle->start();
$motorcycle->stop();
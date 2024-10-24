<?php
require_once 'Vehicle.php';
require_once 'Car.php';
require_once 'Motorcycle.php';

$newMoto = new Motorcycle('BMW', '200', 'red', '2020', 'sport', 300);
$newMoto->start();
echo 'Брэнд мотоцикла: ' . $newMoto->getBrand() . PHP_EOL;
$newMoto->makeMaxSpeed();
$newMoto->stop();

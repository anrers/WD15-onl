<?php
require_once 'C:\OSPanel\home\homework-23\attraction_2\Car.php';
require_once 'C:\OSPanel\home\homework-23\attraction_2\Motorcycle.php';


$motoMoto = new Motorcycle('Husqvarna', 'VITPILEN 801', 'green', 2, 120, 180, 'kross');
echo $motoMoto->getAll() . PHP_EOL;
echo $motoMoto->start() . PHP_EOL;


$auto = new Car('Kia', 'Rio', 'white', 4, 160, 'sedan', 2);
echo $auto->getAll() . PHP_EOL;
echo $auto->start() . PHP_EOL;
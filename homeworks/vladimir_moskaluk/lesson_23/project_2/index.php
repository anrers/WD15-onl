<?php


// Автозагрузка классов
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

// Создаем объекты различных транспортных средств
$car = new Car("Toyota", "Camry", 240, 4);
$motorcycle = new Motorcycle("Yamaha", "YZF-R3", 180, "Sport");
$bicycle = new Bicycle("Giant", "Defy", 30, "Disc");
$truck = new Truck("Volvo", "FH16", 120, 18);
$bus = new Bus("Mercedes", "Sprinter", 160, 20);

// Используем методы и выводим информацию о каждом транспортном средстве
echo "<h2>Car Details:</h2>";
echo $car->start() . "<br>";
echo "Brand: " . $car->getBrand() . "<br>";
echo "Model: " . $car->getModel() . "<br>";
echo "Max Speed: " . $car->getMaxSpeed() . " km/h<br>";
echo "Number of Doors: " . $car->getNumberOfDoors() . "<br>";
echo $car->stop() . "<br><br>";

echo "<h2>Motorcycle Details:</h2>";
echo $motorcycle->start() . "<br>";
echo "Brand: " . $motorcycle->getBrand() . "<br>";
echo "Model: " . $motorcycle->getModel() . "<br>";
echo "Max Speed: " . $motorcycle->getMaxSpeed() . " km/h<br>";
echo "Type: " . $motorcycle->getType() . "<br>";
echo $motorcycle->stop() . "<br><br>";

echo "<h2>Bicycle Details:</h2>";
echo $bicycle->start() . "<br>";
echo "Brand: " . $bicycle->getBrand() . "<br>";
echo "Model: " . $bicycle->getModel() . "<br>";
echo "Max Speed: " . $bicycle->getMaxSpeed() . " km/h<br>";
echo "Brake Type: " . $bicycle->getBrakeType() . "<br>";
echo $bicycle->brake() . "<br>";
echo $bicycle->stop() . "<br><br>";

echo "<h2>Truck Details:</h2>";
echo $truck->start() . "<br>";
echo "Brand: " . $truck->getBrand() . "<br>";
echo "Model: " . $truck->getModel() . "<br>";
echo "Max Speed: " . $truck->getMaxSpeed() . " km/h<br>";
echo "Capacity: " . $truck->getCapacity() . " tons<br>";
echo $truck->stop() . "<br><br>";

echo "<h2>Bus Details:</h2>";
echo $bus->start() . "<br>";
echo "Brand: " . $bus->getBrand() . "<br>";
echo "Model: " . $bus->getModel() . "<br>";
echo "Max Speed: " . $bus->getMaxSpeed() . " km/h<br>";
echo "Number of Seats: " . $bus->getNumberOfSeats() . "<br>";
echo $bus->stop() . "<br><br>";

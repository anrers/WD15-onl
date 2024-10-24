<?php

class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function start() {
        echo "The vehicle is starting.\n";
    }

    public function stop() {
        echo "The vehicle is stopping.\n";
    }

    public function getDetails() {
        return "{$this->year} {$this->make} {$this->model}";
    }
}

class Car extends Vehicle {
    private $doors;
    private $maxSpeed;

    public function __construct($make, $model, $year, $doors, $maxSpeed) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
        $this->maxSpeed = $maxSpeed;
    }

    public function openDoors() {
        echo "The car doors are opening.\n";
    }

    public function getDetails() {
        return parent::getDetails() . ", Doors: {$this->doors}, Max Speed: {$this->maxSpeed} km/h";
    }
}

class Motorcycle extends Vehicle {
    private $type;
    private $maxSpeed;

    public function __construct($make, $model, $year, $type, $maxSpeed) {
        parent::__construct($make, $model, $year);
        $this->type = $type;
        $this->maxSpeed = $maxSpeed;
    }

    public function doWheelie() {
        echo "The motorcycle is doing a wheelie!\n";
    }

    public function getDetails() {
        return parent::getDetails() . ", Type: {$this->type}, Max Speed: {$this->maxSpeed} km/h";
    }
}

class Truck extends Vehicle {
    private $loadCapacity;

    public function __construct($make, $model, $year, $loadCapacity) {
        parent::__construct($make, $model, $year);
        $this->loadCapacity = $loadCapacity;
    }

    public function loadCargo() {
        echo "The truck is being loaded with cargo.\n";
    }

    public function getDetails() {
        return parent::getDetails() . ", Load Capacity: {$this->loadCapacity} tons";
    }
}

class Bus extends Vehicle {
    private $seatingCapacity;

    public function __construct($make, $model, $year, $seatingCapacity) {
        parent::__construct($make, $model, $year);
        $this->seatingCapacity = $seatingCapacity;
    }

    public function boardPassengers() {
        echo "Passengers are boarding the bus.\n";
    }

    public function getDetails() {
        return parent::getDetails() . ", Seating Capacity: {$this->seatingCapacity} seats";
    }
}

class Bicycle extends Vehicle {
    private $type;

    public function __construct($make, $model, $year, $type) {
        parent::__construct($make, $model, $year);
        $this->type = $type;
    }

    public function brake() {
        echo "The bicycle is braking.\n";
    }

    public function getDetails() {
        return parent::getDetails() . ", Type: {$this->type}";
    }
}

$car = new Car('Toyota', 'RAV4', 2020, 4, 180);
echo $car->getDetails() . "\n";
$car->start();
$car->openDoors();
$car->stop();

echo "\n";

$motorcycle = new Motorcycle('Honda', 'CBR', 2021, 'Sport', 220);
echo $motorcycle->getDetails() . "\n";
$motorcycle->start();
$motorcycle->doWheelie();
$motorcycle->stop();

echo "\n";

$truck = new Truck('Volvo', 'FH16', 2018, 20);
echo $truck->getDetails() . "\n";
$truck->start();
$truck->loadCargo();
$truck->stop();

echo "\n";

$bus = new Bus('Mercedes-Benz', 'Sprinter', 2019, 50);
echo $bus->getDetails() . "\n";
$bus->start();
$bus->boardPassengers();
$bus->stop();

echo "\n";

$bicycle = new Bicycle('Dont', 'Know', 2022, 'Road');
echo $bicycle->getDetails() . "\n";
$bicycle->start();
$bicycle->brake();
$bicycle->stop();
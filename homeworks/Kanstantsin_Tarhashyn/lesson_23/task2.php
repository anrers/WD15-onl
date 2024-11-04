<?php

class Vehicle 
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $isRunning = false,
    ) {}

    public function start()
    {
        $this->isRunning = true;
        echo "{$this->make} {$this->model} is now running.\n";
    }

    public function stop()
    {
        $this->isRunning = false;
        echo "{$this->make} {$this->model} has stopped.\n";
    }
}

class Car extends Vehicle
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $doors,
        public $maxSpeed,
    ) {
        parent::__construct($make, $model, $year);
    }

    public function getDoors()
    {
        return $this->doors;
    }

    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }
}

class Motorcycle extends Vehicle 
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $type,
        public $maxSpeed,
    ) {
        parent::__construct($make, $model, $year);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }
}

class Truck extends Vehicle
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $capacity,
        public $axles,
    ) {
        parent::__construct($make, $model, $year);
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getAxles()
    {
        return $this->axles;
    }
}

class Bus extends Vehicle 
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $seatingCapacity,
        public $routeNumber,
    ) {
        parent::__construct($make, $model, $year);
    }

    public function getSeatingCapacity()
    {
        return $this->seatingCapacity;
    }

    public function getRouteNumber()
    {
        return $this->routeNumber;
    }
}

class Bicycle extends Vehicle
{
    public function __construct(
        public $make,
        public $model,
        public $year,
        public $gearCount,
    ) {
        parent::__construct($make, $model, $year);
    }

    public function brake()
    {
        echo "{$this->make} {$this->model} is braking.\n";
    }

    public function getGearCount()
    {
        return $this->gearCount;
    }
}

$car = new Car("BMW", "X5", 2021, 4, 320);
$motorcycle = new Motorcycle("Kawasaki", "1000", 2024, "Sport", 180);
$truck = new Truck("Ford", "LX15000", 2019, 30000, 4);
$bus = new Bus("Mercedes", "Sprinter", 2022, 20, 1111);
$bicycle = new Bicycle("Giant", "Escape 3", 2021, 21);

$car->start();
$car->stop();

$motorcycle->start();
$motorcycle->stop();

echo "Car max speed: " . $car->getMaxSpeed() . " km/h\n";
echo "Motorcycle type: " . $motorcycle->getType() . "\n";
echo "Truck capacity: " . $truck->getCapacity() . " kg\n";
echo "Bus seating capacity: " . $bus->getSeatingCapacity() . "\n";

$bicycle->brake(); 
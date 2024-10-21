<?php
class Car {
    private $make;
    private $model;
    private $color;
    private $year;

    public function __construct($make, $model, $color, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->color = $color;
        $this->year = $year;
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getColor() {
        return $this->color;
    }

    public function getYear() {
        return $this->year;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Car Info: {$this->make} {$this->model}, Color: {$this->color}, Year: {$this->year}" . PHP_EOL;
    }
}

$car = new Car("Toyota", "RAV4", "Silver", 2020);
$car->displayInfo();
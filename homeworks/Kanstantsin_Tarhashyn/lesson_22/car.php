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

    public function setModel ($model) {
        $this->model = $model;
    }

    public function setColor ($color) {
        $this->color = $color;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Car info is {$this->make} {$this->model}, color is {$this->color}, year is {$this->year}\n";
    }
}

$car = new Car("BMW", "X5", "Black", 2024);
$car->displayInfo();
<?php
class Circle {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }

    public function displayInfo() {
        echo "Circle Radius: {$this->radius}, Area: " . $this->calculateArea() . PHP_EOL;
    }
}

$circle = new Circle(3);
$circle->displayInfo();
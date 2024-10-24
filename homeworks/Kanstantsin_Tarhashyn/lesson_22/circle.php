<?php

class Circle {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getRadius () {
        return $this->radius;
    }

    public function setRadius ($radius) {
        $this->radius = $radius;
    }

    public function circleArea () {
        return pi() * pow($this->radius,2);
    }

    public function showInfo () {
        echo "Circle radius is {$this->radius}, Area is " . $this->circleArea();
    }
}

$circle = new Circle(10);
$circle->showInfo();
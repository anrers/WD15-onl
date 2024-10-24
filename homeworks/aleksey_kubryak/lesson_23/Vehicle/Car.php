<?php

require_once 'Vehicle.php';

class Car extends Vehicle {
    public function __construct(
        public string $maxSpeed,
        public string $brand,
        public string $weight,
        public int $numberOfDoors
    ) {
        parent::__construct($maxSpeed, $brand, $weight);
    }

    public function honk() {
        echo "{$this->brand} сигналит" . PHP_EOL;
    }
}
<?php

require_once 'Vehicle.php';

class Motorcycle extends Vehicle {
    public function __construct(
        public string $maxSpeed,
        public string $brand,
        public string $weight,
        public string $type
    ) {
        parent::__construct($maxSpeed, $brand, $weight);
    }
    public function start() {
        echo parent::start() . PHP_EOL;
    }
}
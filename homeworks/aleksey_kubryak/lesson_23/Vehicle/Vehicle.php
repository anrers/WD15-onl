<?php

class Vehicle {
    public function __construct(
        public string $maxSpeed,
        public string $brand,
        public string $weight,
    ) {}

    public function start() {
        echo "{$this->brand} запускается" . PHP_EOL;
    }

    public function stop() {
        echo "{$this->brand} останавливается" . PHP_EOL;
    }
    public function getInf() {
        echo "{$this->brand} едет с максимальной скоростью {$this->maxSpeed}, масса {$this->weight}" . PHP_EOL;
    }
}
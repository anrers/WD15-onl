<?php

require_once 'Vehicle.php';

class Truck extends Vehicle
{
    private int $capacity;

    public function __construct(string $brand, string $model, int $maxSpeed, int $capacity)
    {
        parent::__construct($brand, $model, $maxSpeed);
        $this->capacity = $capacity;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function start(): string
    {
        return parent::start() . " This truck has a capacity of " . $this->capacity . " tons.";
    }
}

<?php

class Car extends Vehicle
{
    private int $numberOfDoors;

    public function __construct(string $brand, string $model, int $maxSpeed, int $numberOfDoors)
    {
        parent::__construct($brand, $model, $maxSpeed);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function getNumberOfDoors(): int
    {
        return $this->numberOfDoors;
    }

    public function start(): string
    {
        return parent::start() . " This car has " . $this->numberOfDoors . " doors.";
    }
}

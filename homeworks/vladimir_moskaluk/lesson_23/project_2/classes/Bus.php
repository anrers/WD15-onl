<?php

require_once 'Vehicle.php';

class Bus extends Vehicle
{
    private int $numberOfSeats;

    public function __construct(string $brand, string $model, int $maxSpeed, int $numberOfSeats)
    {
        parent::__construct($brand, $model, $maxSpeed);
        $this->numberOfSeats = $numberOfSeats;
    }

    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
    }

    public function start(): string
    {
        return parent::start() . " This bus has " . $this->numberOfSeats . " seats.";
    }
}

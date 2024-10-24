<?php

require_once 'Vehicle.php';

class Bicycle extends Vehicle
{
    private string $brakeType;

    public function __construct(string $brand, string $model, int $maxSpeed, string $brakeType)
    {
        parent::__construct($brand, $model, $maxSpeed);
        $this->brakeType = $brakeType;
    }

    public function getBrakeType(): string
    {
        return $this->brakeType;
    }

    public function start(): string
    {
        return parent::start() . " This bicycle has " . $this->brakeType . " brakes.";
    }

    public function brake(): string
    {
        return "Applying " . $this->brakeType . " brakes.";
    }
}

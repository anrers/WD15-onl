<?php
require_once 'Vehicle.php';

class Motorcycle extends MechanicVehicle
{

    public function __construct(
        string $brand,
        string $model,
        string $color,
        string $year,
        int $passengersNumber,
        string $fuelType,
        string $engineType,
        int $fuelTankCapacity,
        int $maxSpeed,
    )
    {
        parent::__construct($brand, $model, $color, $year, $passengersNumber, $fuelType, $engineType, $fuelTankCapacity, $maxSpeed);
    }
}
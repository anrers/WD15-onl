<?php
require_once 'MechanicVehicle.php';

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

    public function start(): void
    {
        echo 'Motorcycle engine is started...<br>';
        echo '<br>';
    }

    public function move(): void
    {
        echo 'Motorcycle is moving...<br>';
        echo '<br>';
    }

    public function stop(): void
    {
        echo 'Motorcycle stopped... is stopped...<br>';
        echo '<br>';
    }

}
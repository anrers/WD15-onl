<?php
require_once 'Vehicle.php';

abstract class MechanicVehicle extends Vehicle
{
    public function __construct(
        string         $brand,
        string         $model,
        string         $color,
        string         $year,
        int            $passengersNumber,
        private string $fuelType,
        private string $engineType,
        private int    $fuelTankCapacity,
        private int    $maxSpeed,
    )
    {
        parent::__construct($brand, $model, $color, $year, $passengersNumber);
    }

    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    public function getEngineType(): string
    {
        return $this->engineType;
    }

    public function setEngineType(string $engineType): void
    {
        $this->engineType = $engineType;
    }

    public function getFuelTankCapacity(): int
    {
        return $this->fuelTankCapacity;
    }

    public function setFuelTankCapacity(int $fuelTankCapacity): void
    {
        $this->fuelTankCapacity = $fuelTankCapacity;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(int $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }
}

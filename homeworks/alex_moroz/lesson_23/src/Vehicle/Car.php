<?php
require_once 'Vehicle.php';

class Car extends MechanicVehicle
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
        private int $doorsNumber,
        private string $bodyType,
    )
    {
        parent::__construct($brand, $model, $color, $year, $passengersNumber, $fuelType, $engineType, $fuelTankCapacity, $maxSpeed);
    }

    public function getDoorsNumber(): int
    {
        return $this->doorsNumber;
    }

    public function setDoorsNumber(int $doorsNumber): void
    {
        $this->doorsNumber = $doorsNumber;
    }

    public function getBodyType(): string
    {
        return $this->bodyType;
    }

    public function setBodyType(string $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    public function canOpenPassengersDoor(): bool
    {
        if ($this->doorsNumber > 2) {
            return true;
        }
        return false;
    }
}
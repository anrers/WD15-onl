<?php
require_once 'MechanicVehicle.php';

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

    public function start(): void
    {
        echo 'Car engine is started...<br>';
        echo '<br>';
    }

    public function move(): void
    {
        echo 'Car is moving...<br>';
        echo '<br>';
    }

    public function stop(): void
    {
        echo 'Car is stopped...<br>';
        echo '<br>';
    }
}
<?php
require_once 'MechanicVehicle.php';

class Bus extends MechanicVehicle
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
        private int $doorsNumber
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

    public function start(): void
    {
        $this->doorsCloseNotification();
        parent::start();
    }

    public function move(): void
    {
        $this->nextStationNotification();
        echo '<br>';
    }

    public function stop(): void
    {
        parent::stop();
        $this->doorsOpenNotification();
        echo '<br>';
    }

    private function doorsCloseNotification()
    {
        echo 'Doors are closing.<br>';
    }

    private function nextStationNotification()
    {
        echo "Next station ... <br>";
    }

    private function doorsOpenNotification()
    {
        echo 'Doors are opening.<br>';
    }

}
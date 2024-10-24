<?php
require 'Vehicle.php';

class Car extends Vehicle
{
    protected int $numbersOfDoors;
    protected int $maxSpeed;

    public function __construct(
        $model,
        $year,
        $color,
        $currentSpeed,
        $numberOfDoors,
        $maxSpeed
    )
    {
        parent::__construct($model, $year, $color, $currentSpeed);
        $this->numbersOfDoors = $numberOfDoors;
        $this->maxSpeed = $maxSpeed;
    }

    public function openTrunk()
    {
        echo "Багажник открыт\n";
    }

    public function honkHorn()
    {
        echo "Бип-бип!\n";
    }
}

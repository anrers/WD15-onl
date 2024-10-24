<?php
require 'Vehicle.php';

class Motorcycle extends Vehicle
{
    protected string $type;
    protected int $maxSpeed;

    public function __construct($model, $year, $color, $currentSpeed, $type, $maxSpeed)
    {
        parent::__construct($model, $year, $color, $currentSpeed);
        $this->type = $type;
        $this->maxSpeed = $maxSpeed;

    }

    public function popWheelie()
    {
        echo "Выполняется трюк: подъем переднего колеса\n";

    }

}
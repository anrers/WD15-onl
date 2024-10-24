<?php

require_once 'Vehicle.php';
class Motorcycle extends Vehicle
{


    public function __construct(
        string $brand,
        string $model,
        string $color,
        string $year,
        public string $type,
        public int $maxSpeed,
    )
    {
        parent::__construct($brand, $model, $color, $year);
    }

    public function vehicleInfo(): string
    {
        return parent::vehicleInfo() . ' ' . $this->type . ' ' . $this->maxSpeed .PHP_EOL;
    }
    public function makeMaxSpeed()
    {
        if ($this->maxSpeed > 200) {
            echo "Брат, не гоняй" . PHP_EOL;
        }
    }
}


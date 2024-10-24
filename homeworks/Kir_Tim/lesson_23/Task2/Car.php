<?php

require_once 'Vehicle.php';
class Car extends Vehicle
{


    public function __construct(
        string $brand,
        string $model,
        string $color,
        string $year,
        public int $doorsQuantity,
        public int $maxSpeed
    )
    {
        parent::__construct($brand, $model, $color, $year);
    }

       public function vehicleInfo(): string
       {
        return parent::vehicleInfo() . ' ' . $this->doorsQuantity . ' ' . $this->maxSpeed;
    }


}



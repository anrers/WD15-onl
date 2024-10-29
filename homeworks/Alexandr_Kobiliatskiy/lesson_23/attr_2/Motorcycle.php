<?php
require_once 'C:\OSPanel\home\homework-23\attraction_2\Vehicle.php';
class Motorcycle extends Vehicle
{
    public function __construct(
        string $name,
        string $model,
        string $color,
        int $wheelCount,
        int $maxSpeed,

        public int $weight,
        public string $type,
    ) {
        parent::__construct(
            $name,
            $model,
            $color,
            $wheelCount,
            $maxSpeed,
        );
    }

    public function getAll()
    {
        return "$this->name, $this->model, $this->type, $this->color, $this->wheelCount, $this->maxSpeed, $this->weight";
    }
}
<?php
class Vehicle 
{
    public function __construct
    (
        public string $name,
        public string $model,
        public string $color,
        public int $wheelCount,
        public int $maxSpeed,
    )
    {

    }

    public function getAll()
    {
        return "$this->name, $this->model, $this->color, $this->wheelCount, $this->maxSpeed";
    }

    public function start()
    {
        echo "Др-др-др";
    }
}
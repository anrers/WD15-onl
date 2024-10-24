<?php

require_once 'Vehicle.php';

class Motorcycle extends Vehicle
{
    private string $type;

    public function __construct(string $brand, string $model, int $maxSpeed, string $type)
    {
        parent::__construct($brand, $model, $maxSpeed);
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function start(): string
    {
        return parent::start() . " This motorcycle is a " . $this->type . ".";
    }
}

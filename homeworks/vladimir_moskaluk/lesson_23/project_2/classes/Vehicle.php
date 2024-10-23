<?php

abstract class Vehicle
{
    protected string $brand;
    protected string $model;
    protected int $maxSpeed;

    public function __construct(string $brand, string $model, int $maxSpeed)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->maxSpeed = $maxSpeed;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function start(): string
    {
        return "Starting " . $this->brand . " " . $this->model . ".";
    }

    public function stop(): string
    {
        return "Stopping " . $this->brand . " " . $this->model . ".";
    }
}

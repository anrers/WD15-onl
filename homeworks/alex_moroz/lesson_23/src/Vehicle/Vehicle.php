<?php
require_once 'VehicleOptions.php';

abstract class Vehicle implements VehicleOptions
{
    public function __construct(
        private string $brand,
        private string $model,
        private string $color,
        private int    $year,
        private int    $passengersNumber,
    )
    {}

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getPassengersNumber(): int
    {
        return $this->passengersNumber;
    }

    public function setPassengersNumber(int $passengersNumber): void
    {
        $this->passengersNumber = $passengersNumber;
    }

    public function start(): void {
        echo $this->getBrandModelInfo() . ' is starting move...<br>';
        echo '<br>';
    }

    public function move(): void {
        echo $this->getBrandModelInfo() . ' is moving...<br>';
        echo '<br>';
    }

    public function stop(): void {
        echo $this->getBrandModelInfo() . ' is stopped...<br>';
    }

    public function getBrandModelInfo(): string
    {
        return get_class($this) . ' ' .
            '{ brand: ' . $this->brand .
            ', model: ' . $this->model  . ' }';
    }

    public function __toString(): string
    {
        return '{' . get_class($this) . ':' .
            'brand: ' . $this->brand .
            'model: ' . $this->model .
            'color: ' . $this->color .
            'year: ' . $this->year .
            'passengersNumber: ' . $this->passengersNumber . '}';
    }
}
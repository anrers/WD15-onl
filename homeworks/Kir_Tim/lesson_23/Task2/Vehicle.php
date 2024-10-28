<?php

class Vehicle
{
    public function __construct(
        public string $brand,
        public string $model,
        public string $color,
        public int    $year,
    )
    {
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function start()
    {
        echo "Запуск двигателя" . PHP_EOL;
    }

    public function stop()
    {
        echo "Остановка двигателя" . PHP_EOL;
    }

    public function vehicleInfo()
    {
        return $this->brand . ' ' . $this->model . ' ' . $this->color . ' ' . $this->year;
    }
}
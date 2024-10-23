<?php

class Vehicle
{
    protected string $model;
    protected int $year;
    protected string $color;
    protected int $currentSpeed;

    public function __construct($model, $year, $color, $currentSpeed)
    {
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->currentSpeed = $currentSpeed;
    }

    public function Start()
    {
        echo "Запуск $this->model\n";

    }

    public function Stop()
    {
        echo "$this->model остановлен\n";
    }

    public function accelerate($amount)
    {
        $this->currentSpeed += $amount;
        echo "Увеличение скорости до $this->currentSpeed км/ч\n";
    }

    public function decelerate($amount)
    {
        $this->currentSpeed -= $amount;
        echo "Уменьшение скорости до $this->currentSpeed км/ч\n";
    }

    public function getInf()
    {
        echo "Model: " . $this->model . "Year: " . $this->year . "Color: " . $this->color;
    }
}
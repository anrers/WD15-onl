<?php

class car
{
    public string $model;
    public string $brand;
    public int $year;
    public string $color;

    //• Конструктор класса, который принимает значения для всех полей и устанавливает их соответствующим образом.
    public function __construct(string $model, string $brand, int $year, string $color)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->year = $year;
        $this->color = $color;
    }

    //• Методы для получения значений полей (геттеры)
    function getModel(): string
    {
        return $this->model;
    }

    function getBrand(): string
    {
        return $this->brand;
    }

    function getYear(): int
    {
        return $this->year;
    }

    function getColor(): string
    {
        return $this->color;
    }

    //• Методы для установки значений полей (сеттеры)
    function setModel($model)
    {
        $this->model = $model;
    }

    function setBrand($brand)
    {
        $this->brand = $brand;
    }

    function setYear($year)
    {
        $this->year = $year;
    }

    //• Методы для вывода информации об автомобиле
    function aboutCar()
    {
        echo "Model: {$this -> model}\n Brand: {$this -> brand}/n Year: {$this -> year}\n Color: {$this -> color}\n ";
    }
}

<?php

class Product
{
    protected string $name;
    protected int|float $price;
    protected string $description;
    protected int|float $count;

    public function __construct($name, $price, string $description, $count)
    {
        $this->name = $name;
        $this->price = $this->setPrice($price);
        $this->description = $description;
        $this->count = $this->setCount($count);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        if ($price > 0) {
            return $this->price = $price;
        } else {
            return false;
        }
    }

    public function getPrice(): int|float
    {
        return $this->price;
    }

    public function setCount($count)
    {
        if ($count <= 0) {
            return "Количество должна быть положительным числом";
        } else {
            return $this->count = $count;
        }
    }

    public function getCount()
    {
        return $this->count;
    }
}


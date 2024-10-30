<?php

declare(strict_types=1);

namespace App\Task1;

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private string $description;
    private int $quantity;

    public function __construct(int $id, string $name, float $price, string $description, int $quantity = 1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getTotalPrice(): float
    {
        return $this->price * $this->quantity;
    }
}

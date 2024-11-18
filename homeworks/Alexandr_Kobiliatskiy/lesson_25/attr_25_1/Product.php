<?php

class Product
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected float $price,
        protected string $description,
        protected int $quantity,
    ) {}

    public function getID(): int
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


    public function changeName(string $val): void
    {
        $this->name = $val;
    }

    public function changeDescription(string $val): void
    {
        $this->description = $val;
    }

    public function changeQuantity(int $val): void
    {
        $this->quantity = $val;
    }

    public function changePrice(int $val): void
    {
        $this->price = $val;
    }
}


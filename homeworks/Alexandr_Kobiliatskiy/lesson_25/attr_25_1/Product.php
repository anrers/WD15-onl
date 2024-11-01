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

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }


    public function changeName(string $val) {
        $this->name = $val;
    }

    public function changeDescription(string $val) {
        $this->description = $val;
    }

    public function changeQuantity(int $val) {
        $this->quantity = $val;
    }

    public function changePrice(int $val) {
        $this->price = $val;
    }
}


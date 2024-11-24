<?php

require_once 'abs.php';

class Product extends AbstractProduct
{
    public function __construct(
        protected int    $id,
        protected string $name,
        protected int    $price
    ) {
    }

    public function calculateProfit(): int
    {
        return $this->price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

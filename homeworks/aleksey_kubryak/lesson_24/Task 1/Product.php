<?php

abstract class Product 
{
    public function __construct(
        protected  int $id,
        protected  string $name,
        protected  float $price,
    ) {
    }

    abstract function calculateProfit();
    
    public function getPrice(): float 
    {
        return $this->price;
    }
}
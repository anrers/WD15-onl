<?php

require_once 'abs.php';

class Product extends AbstractProduct
{
    public function __construct(
        protected int    $id,
        protected string $name,
        protected int    $price
    )
    {
    }

    public function calculateProfit()
    {
        parent::calculateProfit();
    }

    public function getPrice()
    {
        return $this->price;
    }
}

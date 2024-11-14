<?php
require_once(__DIR__ . "/../first_task/AbstractProduct.php");

class Product extends AbstractProduct
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected int $price,
    ) {
    }

    public function calculateProfit(): int
    {
        return $this->price;
    }
}


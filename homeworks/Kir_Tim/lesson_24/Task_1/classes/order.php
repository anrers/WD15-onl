<?php

class Order extends AbstractProduct
{
    public function __construct(
        protected int     $id,
        protected Product $product,
        protected int     $quantity,
    ) {
    }

    public function calculateProfit(): float|int
    {
        $productPrice = $this->product->getPrice();
        return $productPrice * $this->quantity;
    }

    public function changeQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }
}
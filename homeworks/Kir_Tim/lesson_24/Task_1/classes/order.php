<?php

class Order extends AbstractProduct
{
    public function __construct(
        protected int     $id,
        protected Product $product,
        protected int     $quantity,
    )
    {
    }

    public function calculateProfit()
    {
        $productPrice = $this->product->getPrice();
        return $productPrice * $this->quantity;
    }

    public function changeQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
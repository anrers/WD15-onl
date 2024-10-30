<?php
require_once(__DIR__ . "/../first_task/Product.php");

class Order extends AbstractProduct
{
    public function __construct(
        protected int $id,
        protected Product $product,
        protected int $quantity,
    ) {

    }

    public function calculateProfit()
    {
        $price = $this->product->getPrice();
        return $this->quantity * $price;
    }

    public function changeQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}

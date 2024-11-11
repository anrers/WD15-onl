<?php
require_once 'AbstractProduct.php';

class Order extends AbstactProduct
{
    private int $orderId;
    private AbstactProduct $product;
    private int $quantity;

    public function __construct(int $orderId, AbstactProduct $product, int $quantity)
    {
        parent::__construct($product->id, $product->name, $product->price);
        $this->orderId = $orderId;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function calculateProfit()
    {
        return $this->product->price * $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
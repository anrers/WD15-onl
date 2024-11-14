<?php
require_once 'Product.php';
//Из-за того, что класс Product абстрактный, свойство id продукта не используется, name и product одно и тоже....

class Order extends Product
{
    public function __construct(
        int $id,
        string $name,
        float $price,
        public int $idOrder,
        public int $quantity,
    ) {
        parent::__construct($id, $name, $price);
    }

    public function calculateProfit(): float
    {
        return $this->price * $this->quantity;
    }

    public function quantityChange($newQuantity): void
    {
        $this->quantity = $newQuantity;
    }
}
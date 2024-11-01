<?php
require_once 'C:\OSPanel\home\homework-24\attr_24_1\Product.php';
//Из-за того, что класс класс Product абстрактный свойство id продукта не используется, name и product одно и тоже....

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

    public function calculateProfit() {
        return $this->price * $this->quantity;
    }

    public function quantityChange($newQuantity) {
        $this->quantity = $newQuantity;
    }
}
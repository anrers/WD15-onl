<?php

namespace Products;

class Order extends Product
{
    public function __construct(
        private string $id,
        private Product $product,
        private int $quantity,
    ) {
        if ($quantity <= 0) {
            echo 'Quantity cant be less or equals 0. For current ' . get_class($this) . ' with id={' . $id . '} quantity automatically set to 1.';
            $quantity = 1;
        }
        $this->quantity = $quantity;
    }

    public function calculateProfit(): float
    {
        return $this->quantity * $this->product->calculateProfit();
    }

    public function changeQuantity(int $newQuantity): void
    {
        if ($newQuantity > 0) {
            $this->quantity = $newQuantity;
            return;
        }

        echo 'Cant set quantity less or equals 0.';
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
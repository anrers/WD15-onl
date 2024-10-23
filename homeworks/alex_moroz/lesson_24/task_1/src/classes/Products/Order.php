<?php

namespace Products;

class Order extends Product
{
    private Product $product;
    private int $quantity;

    public function __construct(
        string $id,
        Product $product,
        int $quantity,
    ) {
        $this->setId($id);
        $this->product = $product;
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
        if ($this->quantity != $newQuantity && $newQuantity > 0) {
            $this->quantity = $newQuantity;
            return;
        }

        if ($this->quantity < 0) {
            echo 'Cant set quantity less or equals 0.';
        }

        if ($this->quantity == $newQuantity) {
            echo 'You already have {' . $this->quantity . '} items.';
        }
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
<?php

require_once 'Product.php';

class Cart 
{
    public function __construct(
        public array $products = [],
    ) {
    }

    public function addProduct(Product $product): void
    {
        $productName = $product->getName();
        $quantity = $product->getQuantity();

        if (isset($this->products[$productName])) {
            $existingProduct = $this->products[$productName];
            $existingProduct->setQuantity($existingProduct->getQuantity() + $quantity);
        } else {
            $this->products[$productName] = $product;
        }
    }

    public function removeProduct(string $productName): void
    {
        if (isset($this->products[$productName])) {
            unset($this->products[$productName]);
        }
    }

    public function updateProductQuantity(string $productName, int $quantity): void
    {
        if (isset($this->products[$productName])) {
            $this->products[$productName]->setQuantity($quantity);
        }
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice() * $product->getQuantity();
        }
        return $totalPrice;
    }
}
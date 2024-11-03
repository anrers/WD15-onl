<?php
require_once 'Product.php';

class Order
{
    public function __construct(
        protected array $products
    )
    {
    }

    public function addProduct(Product $product)
    {
        $productName = $product->getName();
        $quantity = $product->getQuantity();

        if (!isset($this->products[$productName])) {
            $this->products[$productName] = $product;
        } else {
            $productExist = $this->products[$productName];
            $productExist->setQuantity($productExist->getQuantity() + $quantity);
        }
    }

    public function removeProduct($productName): void
    {
        if (isset($this->products[$productName])) {
            unset($this->products[$productName]);
        }
    }

    public function updateProductQuantity($productName, $quantity): void
    {
        if (isset($this->products[$productName])) {
            $this->products[$productName]->setQuantity($quantity);
        }
    }

    public function cartPrice(): int
    {
        $price = 0;
        foreach ($this->products as $product) {
            $price += $product->getPrice() * $product->getQuantity();
        }
        return $price;
    }
}



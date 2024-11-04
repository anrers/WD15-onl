<?php
require_once 'Product.php';
class Cart
{
    private array $products = [];

    public function addProduct(Product $product)
    {
        if (isset($this->products[$product->getName()])) {
            $existingProduct = $this->products[$product->getName()];
            $existingProduct->setQuantity($existingProduct->getQuantity() + $product->getQuantity());
            return;
        }

        $this->products[$product->getName()] = $product;
    }

    public function removeProduct($productName)
    {
        foreach ($this->products as $index => $product) {
            if ($product->getName() === $productName) {
                unset($this->products[$index]);
                $this->products = array_values($this->products);
                return;
            }
        }
    }

    public function updateProductQunatity(Product $product, $quantity)
    {
        if ($this->products[$product->getName()]) {
            $product->setQuantity($quantity);
            return;
        }
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getTotalPrice();
        }
        return $total;
    }

    public function getProducts()
    {
        return $this->products;
    }
}
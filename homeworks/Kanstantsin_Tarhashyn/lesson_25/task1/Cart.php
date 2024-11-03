<?php
require_once 'Product.php';
class Cart
{
    private array $products = [];

    public function addProduct(Product $product)
    {
        foreach ($this->products as $existingProduct) {
            if ($existingProduct->getName() === $product->getName()) {
                $existingProduct->setQuantity($existingProduct->getQuantity() + $product->getQuantity());
                return;
            }
        }
        $this->products[$product->getName()] = $product;
    }

    public function removeProduct($productName)
    {
        foreach ($this->products as $index => $product)
        {
            if ($product->getName() === $productName)
            {
                unset($this->products[$index]);
                $this->products = array_values($this->products);
                return;
            }
        }
    }

    public function updateProductQunatity($productName, $quantity)
    {
        foreach ($this->products as $product)
        {
            if ($product->getName() === $productName)
            {
                $product->setQuantity($quantity);
                return;
            }
        }
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->products as $product)
        {
            $total += $product->getTotalPrice();
        }
        return $total;
    }

    public function getProducts()
    {
        return $this->products;
    }
}
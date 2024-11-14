<?php
require_once 'Product.php';

class Order
{
    public function __construct(
        protected array $products = []
    ) {
    }

    public function addProduct(Product $product, int $id): void
    {
        if (key_exists($id, $this->products)) {
            throw new InvalidArgumentException("Продукт с ID $id уже существует в библиотеке.");
        } else {
            $this->products[$id] = $product;
        }
    }

    public function deleteProduct(int $id): void
    {
        if (key_exists($id, $this->products)) {
            unset($this->products[$id]);
        }
    }

    public function sumPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += ($product->getPrice() * $product->getCount());
        }
        return $sum;
    }
}



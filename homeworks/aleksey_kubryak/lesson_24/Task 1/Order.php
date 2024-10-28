<?php

require_once 'Product.php';

class Order extends Product 
{
    public function __construct(
        protected  int $id,
        protected  string $product,
        protected  int $quantity,
        protected  Product $classProduct,
    ) {
    }

    public function calculateProfit(): float 
    {
        return $this->classProduct->getPrice() * $this->quantity;
    }
    
    public function updateQuantity($newQuantity): void 
    {
        $this->quantity = $newQuantity;
    }
    
    public function getProduct(): string 
    {
        return $this->product;
    }
    
    public function getQuantity(): int 
    {
        return $this->quantity;
    }
}
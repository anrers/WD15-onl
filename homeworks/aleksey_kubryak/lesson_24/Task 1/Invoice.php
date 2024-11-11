<?php

require_once 'Product.php';
require_once 'Order.php';

class Invoice extends Product 
{
    public function __construct(
        int $id,
        string $name,
        float $price,
        protected  int $idInvoice, 
        protected  int $customer,
        protected  array $products,
    ) {
        parent::__construct($id, $name, $price);
    }

    public function addProduct(Order $order): void 
    {
        $product = $order->getProduct();
        $quantity = $order->getQuantity();
        if (isset($this->products[$product])) {
            $this->products[$product] += $quantity;
        } else {
            $this->products[$product] = $quantity;
        }
    }
    
    public function calculateProfit(): float 
    {
        $totalProfit = 0;
        foreach ($this->products as $item) {
            $totalProfit += parent::getPrice() * $item['quantity'];
        }
        return $totalProfit;
    }
    
    public function updateCustomer($newСustomer): void 
    {
        $this->customer = $newСustomer;
    }
}
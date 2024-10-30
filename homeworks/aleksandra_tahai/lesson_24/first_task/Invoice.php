<?php
require_once 'AbstractProduct.php';
require_once 'Invoice.php';
require_once 'Product.php';
require_once 'Order.php';

class Invoice extends AbstractProduct
{
    public function __construct(
        protected int $id,
        protected string $customer,
        protected array $products = [],
    ) {
    }

    public function addProduct(Order $order)
    {
        $this->products[] = $order;
    }

    public function changeCustomer(string $customer)
    {
        $this->customer = $customer;
    }

    public function calculateProfit(): int
    {
        $sum = 0;
        foreach ($this->products as $order) {
            $a = $order->calculateProfit();
            $sum += $a;
        }
        return $sum;
    }
}



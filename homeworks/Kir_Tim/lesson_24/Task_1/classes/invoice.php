<?php
require_once 'abs.php';
require_once 'order.php';

class Invoice extends AbstractProduct
{
    public function __construct(
        protected int    $id,
        protected string $customer,
        protected array  $products = [],
    ) {
    }

    public function changeCustomer(string $customer)
    {
        $this->customer = $customer;
    }

    public function calculateProfit(): int
    {
        $totalProfit = 0;
        foreach ($this->products as $order) {
            $profit = $order->calculateProfit();
            $totalProfit += $profit;
        }
        return $totalProfit;
    }
}


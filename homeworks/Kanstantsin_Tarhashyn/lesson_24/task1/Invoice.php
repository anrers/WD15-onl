<?php
require_once 'AbstractProduct.php';
require_once 'Order.php';

class Invoice extends AbstactProduct
{
    private string $invoiceId;
    private string $customer;
    private AbstactProduct $product;
    private $products = [];

    public function __construct($invoiceId, $customer, AbstactProduct $product)
    {
        parent::__construct($product->id, $product->name, $product->price);
        $this->invoiceId = $invoiceId;
        $this->customer = $customer;
    }

    public function addProduct(AbstactProduct $product, $quantity)
    {
        $this->products[] = ['product' => $product, 'quantity' => $quantity];
        var_dump($this->products);
    }

    public function calculateProfit()
    {
        $totalProfit = 0;
        foreach ($this->products as $item)
        {
            $totalProfit += $item['product']->price * $item['quantity'];
        }
        return $totalProfit;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}
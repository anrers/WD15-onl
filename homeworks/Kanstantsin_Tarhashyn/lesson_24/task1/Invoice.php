<?php
require_once 'AbstractProduct.php';
require_once 'Order.php';

class Invoice extends AbstactProduct
{
    public function __construct(
        int $id,
        string $name,
        float $price,
        private int $invoiceId, 
        private string $customer,
        private array $products,
        private AbstactProduct $product,
    ) {
        parent::__construct($id, $name, $price);
    }


    public function addProduct(AbstactProduct $product, $quantity)
    {
        $this->products[$product->getId()] = ['id' => $product->getId(),'product' => $product, 'quantity' => $quantity];
        print_r($this->products[$product->getId()]);
    }

    public function getProduct()
    {
        return $this->products;
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
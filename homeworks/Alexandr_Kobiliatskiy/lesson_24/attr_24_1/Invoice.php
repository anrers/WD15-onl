<?php
require_once 'C:\OSPanel\home\homework-24\attr_24_1\Product.php';

class Invoice extends Product
{
    public function __construct(
        public int $id_invoice,
        public string $customer,
        public array $products,
    ) {}

    public function calculateProfit() {
        $summ = 0;
        foreach ($this->products as $product) {
            $summProduct = $product->price * $product->quantity;
            $summ += $summProduct;
        }
        return $summ;
    }

    public function addProduct($productObject) {
        $this->products[] = $productObject;
    }

    public function removeProduct($productObject) {
            unset($this->products[array_search($productObject, $this->products)]);
    }

    public function changeCustomer($newCustomer) {
        $this->customer = $newCustomer;
    }
}
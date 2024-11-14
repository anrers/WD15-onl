<?php
require_once 'Product.php';

class Invoice extends Product
{
    public function __construct(
        public int $id_invoice,
        public string $customer,
        public array $products,
    ) {}

    public function calculateProfit(): float|int
    {
        $summ = 0;
        foreach ($this->products as $product) {
            $summProduct = $product->price * $product->quantity;
            $summ += $summProduct;
        }
        return $summ;
    }

    public function addProduct($productObject): void
    {
        $this->products[$productObject->id] = $productObject;
    }

    //public function removeProduct($productObject): void
    public function removeProduct(int $id): void
    {
        unset($this->products[$id]);
    }

    public function changeCustomer($newCustomer): void
    {
        $this->customer = $newCustomer;
    }
}
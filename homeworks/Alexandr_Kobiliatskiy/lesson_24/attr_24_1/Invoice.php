<?php
require_once 'Product.php';

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

    public function addProduct($productObject): void
    {
        //$this->products[] = $productObject; //Это решение мне нравится больше потому что при нескольких добавлениях будет перезапись
        $this->products['addedProduct'] = $productObject;
    }

    //public function removeProduct($productObject): void
    public function removeProduct(): void
    {
            //unset($this->products[array_search($productObject, $this->products)]);
        unset($this->products['addedProduct']);
    }

    public function changeCustomer($newCustomer): void
    {
        $this->customer = $newCustomer;
    }
}
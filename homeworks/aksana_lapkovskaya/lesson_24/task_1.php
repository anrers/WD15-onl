<?php

abstract class Product {
    public $id;
    public $name;
    public $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateProfit();
}

class PhysicalProduct extends Product {
    public function calculateProfit() {
        return $this->price;
    }
}

class Order extends Product {
    public $product;
    public $quantity;

    public function __construct($orderId, Product $product, $quantity) {
        parent::__construct($orderId, $product->name, $product->price);
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function calculateProfit() {
        return $this->product->price * $this->quantity;
    }

    public function updateQuantity($newQuantity) {
        $this->quantity = $newQuantity;
    }
}

class Invoice extends Product {
    public $customer;
    public $products = [];

    public function __construct($invoiceId, $customer) {
        parent::__construct($invoiceId, "Invoice for $customer", 0);
        $this->customer = $customer;
    }

    public function addProduct(Product $product, $quantity) {
        $this->products[] = new Order($product->id, $product, $quantity);
    }

    public function calculateProfit() {
        $totalProfit = 0;
        foreach ($this->products as $order) {
            $totalProfit += $order->calculateProfit();
        }
        return $totalProfit;
    }

    public function updateCustomer($newCustomer) {
        $this->customer = $newCustomer;
    }
}

$product1 = new PhysicalProduct(1, "Product1", 50);
$product2 = new PhysicalProduct(2, "Product2", 30);

$invoice = new Invoice(1, "Customer1");
$invoice->addProduct($product1, 3);
$invoice->addProduct($product2, 2);

echo "Total Profit: " . $invoice->calculateProfit();

?>
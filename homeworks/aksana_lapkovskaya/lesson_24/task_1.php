<?php

abstract class Product {
    public int $id;
    public string $name;
    public float $price;

    public function __construct(int $id, string $name, float $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateProfit(): float;
}

class PhysicalProduct extends Product {
    public function calculateProfit(): float {
        return $this->price;
    }
}

class Order extends Product {
    public Product $product;
    public int $quantity;

    public function __construct(int $orderId, Product $product, int $quantity) {
        parent::__construct($orderId, $product->name, $product->price);
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function calculateProfit(): float {
        return $this->product->price * $this->quantity;
    }

    public function updateQuantity(int $newQuantity): void {
        $this->quantity = $newQuantity;
    }
}

class Invoice extends Product {
    public string $customer;
    /** @var Order[] */
    public array $products = [];

    public function __construct(int $invoiceId, string $customer) {
        parent::__construct($invoiceId, "Invoice for $customer", 0.0);
        $this->customer = $customer;
    }

    public function addProduct(Product $product, int $quantity): void {
        $this->products[] = new Order($product->id, $product, $quantity);
    }

    public function calculateProfit(): float {
        $totalProfit = 0.0;
        foreach ($this->products as $order) {
            $totalProfit += $order->calculateProfit();
        }
        return $totalProfit;
    }

    public function updateCustomer(string $newCustomer): void {
        $this->customer = $newCustomer;
    }
}


$product1 = new PhysicalProduct(1, "Product1", 50.0);
$product2 = new PhysicalProduct(2, "Product2", 30.0);

$invoice = new Invoice(1, "Customer1");
$invoice->addProduct($product1, 3);
$invoice->addProduct($product2, 2);

echo "Total Profit: " . $invoice->calculateProfit();

?>
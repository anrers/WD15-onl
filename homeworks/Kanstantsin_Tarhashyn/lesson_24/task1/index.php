<?php
require_once 'AbstractProduct.php';
require_once 'Order.php';
require_once 'Invoice.php';
require_once 'Product.php';

$product1 = new Product(1, "Camera", 1000);
$order1 = new Order(1, $product1, 2);
$invoice1 = new Invoice(1, "John Doe", $product1);

$product2 = new Product(2, "Laptop", 2000);
$order2 = new Order(2, $product2, 3);
$invoice2 = new Invoice(2, "John Boe", $product2);

$invoice1->addProduct($product1, 3);
$invoice2->addProduct($product2, 5);
echo $invoice1->calculateProfit() . "\n";
echo $invoice2->calculateProfit() . "\n"; 
echo "Total profit for the invoice1 " . $invoice1->calculateProfit() . "\n";
echo "Total profit for the invoice2 " . $invoice2->calculateProfit() . "\n";
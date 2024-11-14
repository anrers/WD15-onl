<?php
require_once 'Product.php';
require_once 'Cart.php';

$product1 = new Product("Laptop", 10000, "Very good laptop", 2);
$product2 = new Product("iPhone", 15000, "Iphone 14 Pro", 2);
$product3 = new Product("Camera", 5000, "Very good camera", 2);

$cart = new Cart();
$cart->addProduct($product1);
$cart->addProduct($product2);
$cart->addProduct($product3);

echo "The total price of the products: " . $cart->getTotalPrice() . "\n";

$cart->updateProductQunatity($product2, 1);

echo "The total price of the products after update: " . $cart->getTotalPrice() . "\n";

$cart->removeProduct("Camera");

echo "The total price of the products after delete: " . $cart->getTotalPrice() . "\n";
 

<?php

// Подключаем необходимые классы вручную
require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/src/Cart.php';

use App\Task1\Cart;
use App\Task1\Product;

// Работа с корзиной
$cart = new Cart();
$product1 = new Product('Laptop', 999.99, 'High performance laptop', 1);
$product2 = new Product('Mouse', 25.50, 'Wireless mouse', 2);

$cart->addProduct($product1);
$cart->addProduct($product2);

echo 'Total Cart Cost: ' . $cart->getTotalCost() . PHP_EOL;

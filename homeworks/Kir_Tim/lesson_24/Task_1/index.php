<?php
require_once 'classes\abs.php';
require_once 'classes\order.php';
require_once 'classes\invoice.php';
require_once 'classes\product.php';

$product1 = new product(1, 'prod1', 100);
$product2 = new product(2, 'prod2', 10);
$product3 = new product(3, 'prod3', 10);
$order1 = new Order(1, $product3, 100);
$order2 = new Order(2, $product1, 100);

echo "Прибыль от заказа: " . $order1->calculateProfit() .PHP_EOL;
$order1->changeQuantity(10);
echo "Обновленная прибыль от заказа: " . $order1->calculateProfit() .PHP_EOL;

$invoice1 = new Invoice(1, "Customer1", [$order1, $order2]);
echo "Общая прибыль: " . $invoice1->calculateProfit();
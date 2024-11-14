<?php
require_once 'Order.php';
require_once 'Invoice.php';

//Насоздаем экземпляров класса Order
$orderOne = new Order(1, 'shirt', 20.5, 1, 10);
$orderTwo = new Order(2, 't-shirt', 10.5, 1, 150);
$orderThree = new Order(3, 'trousers', 15.8, 1, 13);
$orderFore = new Order(4, 'jacket', 52.4, 1, 15);

//Проверка
$orders = [];

$invoice = new Invoice(1, 'Alexandr', $orders);

$invoice->addProduct($orderOne);
$invoice->addProduct($orderTwo);
$invoice->addProduct($orderThree);
$invoice->addProduct($orderFore);

var_dump($invoice);
var_dump($invoice->calculateProfit());

$invoice->removeProduct(3);
var_dump($invoice);
var_dump($invoice->calculateProfit());

//Все работает 14.11.2024 13:42
<?php
require_once 'Order.php';
require_once 'Invoice.php';

//Насоздаем экземпляров класса Order
$orderOne = new Order(1, 'shirt', 20.5, 1, 10);
$orderTwo = new Order(2, 't-shirt', 10.5, 1, 150);
$orderThree = new Order(3, 'trousers', 15.8, 1, 13);
$orderFore = new Order(4, 'jacket', 52.4, 1, 15);

//Массив объектов ордеров
$orders = [$orderOne, $orderTwo, $orderThree, $orderFore];

$invoice = new Invoice(1, 'Alexandr', $orders);
var_dump($invoice->calculateProfit());

$invoice->removeProduct(); //В новом варианте если не добавляли, то и удалять нечего....
var_dump($invoice->calculateProfit());

$invoice->addProduct($orderFore);
var_dump($invoice->calculateProfit());

$invoice->removeProduct();
var_dump($invoice->calculateProfit());

//Все работает
<?php

spl_autoload_register(function ($class_name) {
    require_once '../src/classes/' . $class_name . '.php';
});

use Products\Product as Product;
use Products\Order as Order;
use Products\Invoice as Invoice;

$product_1 = new Product('1', 'Product 1', 5);
$product_2 = new Product('2', 'Product 2', 7);
$product_3 = new Product('3', 'Product 3', 4);
$product_4 = new Product('4', 'Gift product', -5);

assert(0 == $product_4->getPrice());

$order_1 = new Order('order_1', $product_1, 3);
$order_2 = new Order('order_2', $product_2, 3);
$order_3 = new Order('order_3', $product_3, 3);
$order_4 = new Order('order_4', $product_4, -5);

assert(1 == $order_4->getQuantity());

//order 1
assert(20 == $product_1->getBenefit()); //assert that product benefit = 20%
assert(3 == $order_1->calculateProfit()); //calculate profit for order_1 (benefit 20%)

$order_1->changeQuantity(5); //change quantity from 3 to 5
assert(5 == $order_1->getQuantity()); //assert that quantity changed from 3 to 5

assert(5 == $order_1->calculateProfit()); //assert that profit for new quantity was changed from 3 to 5

$product_1->setBenefit(30); //set benefit to 30%
assert(30 == $product_1->getBenefit()); //assert that product benefit = 30%

assert(7.5 == $order_1->calculateProfit()); //assert that profit for new quantity was changed from 3 to 5


//order 2
$order_2->changeQuantity(-1);
assert(3 == $order_2->getQuantity()); //shouldn't change quantity from 3 to -1
assert(20 == $product_2->getBenefit()); //assert that product benefit = 20%

//order 3
$order_3->changeQuantity(3);
assert(3 == $order_3->getQuantity()); //shouldn't change quantity from 3 to 3
assert(20 == $product_3->getBenefit()); //assert that product benefit = 20%


$invoice_1 = new Invoice('invoice_1', 'Customer 1');
$invoice_2 = new Invoice('invoice_2', 'Customer 2');
$invoice_3 = new Invoice('invoice_3', 'Customer 3');

//invoice 1
$invoice_1->addProduct($product_4, 3);
assert(1 == count($invoice_1->getProducts()));
assert(3 == $invoice_1->getProducts()['4']['quantity']);
assert(0 == $invoice_1->calculateProfit());

$invoice_1->addProduct($product_4, 3); //should change total quantity of given product
assert(1 == count($invoice_1->getProducts()));
assert(6 == $invoice_1->getProducts()['4']['quantity']);

$invoice_1->changeQuantity($product_4, 3);
assert(1 == count($invoice_1->getProducts()));
assert(3 == $invoice_1->getProducts()['4']['quantity']);

$invoice_1->addProduct($product_4, -3);
assert(0 == count($invoice_1->getProducts())); //if added exited product and (new quantity + old quantity) <= 0 product will be removed

$invoice_1->addProduct($product_4, -3);
assert(0 == count($invoice_1->getProducts())); //if negative or zero quantity non exited product won't be added

$invoice_1->changeQuantity($product_4, -3);
assert(0 == count($invoice_1->getProducts())); //products in Invoice won't be changed if tried to change non-exited product

assert('Customer 1' == $invoice_1->getCustomer());
$invoice_1->setCustomer('Customer 1 changed');
assert('Customer 1 changed' == $invoice_1->getCustomer());


//invoice 2
$invoice_2->addProduct($product_1, 5); //30%
$invoice_2->addProduct($product_2, 5); //20%

assert(2 == count($invoice_2->getProducts()));
assert(5 == $invoice_2->getProducts()['1']['quantity']);
assert(5 == $invoice_2->getProducts()['2']['quantity']);
assert(14.5 == $invoice_2->calculateProfit());

$invoice_2->addProduct($product_1, -6); //should removed product {1}
assert(1 == count($invoice_2->getProducts()));
assert(5 == $invoice_2->getProducts()['2']['quantity']);
assert(7 == $invoice_2->calculateProfit());

$invoice_2->changeQuantity($product_2, 9); //should update product {2} quantity to 9 from 5
assert(1 == count($invoice_2->getProducts()));
assert(9 == $invoice_2->getProducts()['2']['quantity']);
assert(12.6 == $invoice_2->calculateProfit());

$invoice_2->addProduct($product_1, 3); //should add product {1} with quantity 3
assert(2 == count($invoice_2->getProducts()));
assert(3 == $invoice_2->getProducts()['1']['quantity']);
assert(9 == $invoice_2->getProducts()['2']['quantity']);
assert(17.1 == $invoice_2->calculateProfit());


//invoice 3
$invoice_3->addProduct($product_1, 5); //30%
$invoice_3->addProduct($product_2, 5); //20%
$invoice_3->addProduct($product_3, 10); //20%

assert(3 == count($invoice_3->getProducts()));
assert(5 == $invoice_3->getProducts()['1']['quantity']);
assert(5 == $invoice_3->getProducts()['2']['quantity']);
assert(10 == $invoice_3->getProducts()['3']['quantity']);
assert(22.5 == $invoice_3->calculateProfit());

$invoice_3->addProduct($product_1, -6); //should removed product {1}
assert(2 == count($invoice_3->getProducts()));
assert(5 == $invoice_3->getProducts()['2']['quantity']);
assert(10 == $invoice_3->getProducts()['3']['quantity']);
assert(15 == $invoice_3->calculateProfit());

$invoice_3->changeQuantity($product_2, 9); //should update product {2} quantity to 9 from 5
assert(2 == count($invoice_3->getProducts()));
assert(9 == $invoice_3->getProducts()['2']['quantity']);
assert(10 == $invoice_3->getProducts()['3']['quantity']);
assert(20.6 == $invoice_3->calculateProfit());

$invoice_3->addProduct($product_1, 3); //should add product {1} with quantity 3
assert(3 == count($invoice_3->getProducts()));
assert(3 == $invoice_3->getProducts()['1']['quantity']);
assert(9 == $invoice_3->getProducts()['2']['quantity']);
assert(10 == $invoice_3->getProducts()['3']['quantity']);
assert(25.1 == $invoice_3->calculateProfit());
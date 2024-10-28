<?php

spl_autoload_register(function ($class_name) {
    require_once '../src/classes/' . $class_name . '.php';
});

use Products\Product as Product;
use Products\Cart as Cart;

$product_1 = new Product('1', 'Product 1', 'Product 1 desc', 5, 2);
$product_2 = new Product('2', 'Product 2', 'Product 2 desc', 7, 5);

$cart_1 = new Cart('cart_1');

assert(0 == count($cart_1->getProducts()));
assert(0 == $cart_1->calculateTotalCart());

$cart_1->addProductToCart($product_1);
assert(1 == count($cart_1->getProducts()));
assert(10 == $cart_1->calculateTotalCart());

$cart_1->addProductToCart($product_2);
assert(2 == count($cart_1->getProducts()));
assert(45 == $cart_1->calculateTotalCart());

$cart_1->addProductToCart($product_1);
assert(2 == count($cart_1->getProducts()));
assert(55 == $cart_1->calculateTotalCart());

$cart_1->changeProductQuantityInCart($product_1, 10);
assert(2 == count($cart_1->getProducts()));
assert(85 == $cart_1->calculateTotalCart());

$cart_1->changeProductQuantityInCart($product_1, -10);
assert(2 == count($cart_1->getProducts()));
assert(85 == $cart_1->calculateTotalCart());

$cart_1->removeProductFromCart($product_1);
assert(1 == count($cart_1->getProducts()));
assert(35 == $cart_1->calculateTotalCart());

$cart_1->changeProductQuantityInCart($product_1, 1);
assert(1 == count($cart_1->getProducts()));
assert(35 == $cart_1->calculateTotalCart());
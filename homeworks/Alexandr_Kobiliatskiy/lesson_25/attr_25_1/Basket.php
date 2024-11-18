<?php
global $products; //Как-то не уловил когда оно стало требовать делать так. Раньше не требовало....
require_once 'db.php';

class Basket
{
    public function __construct(
        public array $productList,
    ) {}

    public function addProduct(Product $product): void
    {
        $this->productList[$product->getID()] = $product;
    }


    public function changeQuantityBasketForId(int $idProduct, int $quantityProduct): void
    {
        $this->productList[$idProduct]->changeQuantity($quantityProduct);
    }

    public function removeProductForId(int $idProduct): void
    {
        unset($this->productList[$idProduct]);
    }
}


//$oneBasket = new Basket($products);
//
//$oneBasket->addProduct(new Product(7, 'Кроссовки', 120, "Хорошие беговые кроссовки", 1));
//var_dump($oneBasket);
//$oneBasket->changeQuantityBasketForId(7, 50);
//var_dump($oneBasket);
//
//$oneBasket->removeProductForId(4);
//var_dump($oneBasket);

//Работает

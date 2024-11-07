<?php
require_once 'db.php';

class Basket
{
    public function __construct(
        public array $productList,
    ) {}

    public function addProduct(Product $productList): void
    {
        $this->productList[] = $productList;
    }


    public function changeQuantityBasket(string $nameProduct, int $quantityProduct): void
    {
        foreach ($this->productList as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                $arrProd->changeQuantity($quantityProduct);
            }
        }
    }

    public function removeProduct(string $nameProduct): void
    {
        foreach ($this->productList as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                unset($this->productList[array_search($arrProd, $this->productList)]);
            }
        }
    }
}

// $oneBasket = new Basket($products);

// $oneBasket->addProduct(new Product(7, 'Кроссовки', 120, "Хорошие беговые кроссовки", 1));
// var_dump($oneBasket);
// $oneBasket->changeQuantityBasket('Кроссовки', 50);
// var_dump($oneBasket);

// $oneBasket->removeProduct('Джинсы');
// var_dump($oneBasket);

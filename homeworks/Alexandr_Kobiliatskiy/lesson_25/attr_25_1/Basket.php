<?php
require_once 'db.php';

class Basket
{
    public function __construct(
        public array $arrayProducts,
    ) {}

    public function addProduct(Product $arrayProducts) {
        $this->arrayProducts[] = $arrayProducts;
    }


    public function changeQuantityBasket(string $nameProduct, int $quantityProduct) {
        foreach ($this->arrayProducts as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                $arrProd->changeQuantity($quantityProduct);
            }
        }
    }

    public function removeProduct(string $nameProduct) {
        foreach ($this->arrayProducts as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                unset($this->arrayProducts[array_search($arrProd, $this->arrayProducts)]);
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

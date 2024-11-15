<?php
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


    public function changeQuantityBasket(string $nameProduct, int $quantityProduct): void
    {
        foreach ($this->productList as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                $arrProd->changeQuantity($quantityProduct);
            }
        }
    }

    public function changeQuantityBasketForId(int $idProduct, int $quantityProduct): void
    {
        $this->productList[$idProduct]->changeQuantity($quantityProduct); //Здесь закончил, не проверял
    }

    public function removeProduct(string $nameProduct): void
    {
        foreach ($this->productList as $arrProd) {
            if ($arrProd->getName() == $nameProduct) {
                unset($this->productList[array_search($arrProd, $this->productList)]);
            }
        }
    }

    public function removeProductForId(int $idProduct): void
    {
        unset($this->productList[$idProduct]); //Здесь закончил, не проверял
    }
}

// $oneBasket = new Basket($products);

// $oneBasket->addProduct(new Product(7, 'Кроссовки', 120, "Хорошие беговые кроссовки", 1));
// var_dump($oneBasket);
// $oneBasket->changeQuantityBasket('Кроссовки', 50);
// var_dump($oneBasket);

// $oneBasket->removeProduct('Джинсы');
// var_dump($oneBasket);

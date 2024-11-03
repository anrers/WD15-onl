<?php

require_once "order.php";

class Product
{
    public function __construct(
        protected string $name,
        protected int    $price,
        protected string $description,
        protected int    $quantity
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        if ($price > 0) {
            return $this->price = $price;
        }
        return false;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setQuantity($quantity)
    {
        if ($quantity <= 0) {
            return "Количество должно быть больше нуля";
        }
        return $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}

//$new = new Product('aaa', 12, '12412', 10);
//echo $new->getName() . PHP_EOL;
//echo $new->getPrice() . PHP_EOL;
//echo $new->setPrice(1) . PHP_EOL;
//echo $new->getQuantity() . PHP_EOL;
//echo $new->setQuantity(-100) . PHP_EOL;
//var_dump($new);

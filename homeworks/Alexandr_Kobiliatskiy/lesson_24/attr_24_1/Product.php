<?php
//В условии у этого класса должен быть абстрактный класс, поэтому и сам класс абстрактный.....
abstract class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
    ) {}

    abstract function calculateProfit();
}
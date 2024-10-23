<?php

namespace Products;

class Product extends AbstractProduct
{
    public function calculateProfit(): float
    {
        return ($this->getBenefit() * $this->getPrice()) / 100;
    }
}
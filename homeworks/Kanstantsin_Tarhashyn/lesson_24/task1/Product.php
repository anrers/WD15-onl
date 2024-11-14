<?php 

class Product extends AbstactProduct
{
    public function calculateProfit()
    {
        return $this->price;
    }
}
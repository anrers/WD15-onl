<?php

abstract class AbstactProduct
{
    protected $id;
    protected $name;
    protected $price;

    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateProfit();
}
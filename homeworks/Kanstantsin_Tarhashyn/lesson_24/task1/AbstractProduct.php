<?php

abstract class AbstactProduct
{
    protected int $id;
    protected string $name;
    protected float $price;

    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateProfit();

    public function getId()
    {
        return $this->id;
    }
}
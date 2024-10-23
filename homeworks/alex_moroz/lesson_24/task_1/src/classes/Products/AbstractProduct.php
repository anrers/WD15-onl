<?php

namespace Products;

use Interfaces\Products\ProductInterface;

abstract class AbstractProduct implements ProductInterface
{
    private string $id;
    private string $name;
    private float $price;
    private int $benefit = 20;

    public function __construct(
        string $id,
        string $name,
        float $price,
    ) {
        $this->id = $id;
        $this->name = $name;
        if ($price <= 0 ) {
            echo "Price cant be less than 0. For current " . get_class($this) . " with id={" . $id . "} price automatically set to 0.";
            $price = 0;
        }
        $this->price = $price;
    }

    abstract public function calculateProfit(): float;

    public function getBenefit(): float
    {
        return $this->benefit;
    }
    public function setBenefit($benefitValue): void
    {
        $this->benefit = $benefitValue;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
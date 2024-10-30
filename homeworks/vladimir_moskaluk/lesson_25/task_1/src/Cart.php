<?php

declare(strict_types=1);

namespace App\Task1;

class Cart
{
    private array $items = [];

    public function addProduct(Product $product): void
    {
        $productId = $product->getId();

        if (isset($this->items[$productId])) {
            // Если продукт уже есть, увеличиваем его количество
            $existingProduct = $this->items[$productId];
            $existingProduct->setQuantity($existingProduct->getQuantity() + $product->getQuantity());
        } else {
            // Если продукта нет, добавляем его в корзину
            $this->items[$productId] = $product;
        }
    }

    public function removeProduct(int $productId): void
    {
        // Удаляем продукт по id, если он существует
        unset($this->items[$productId]);
    }

    public function updateQuantity(int $productId, int $quantity): void
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]->setQuantity($quantity);
        }
    }

    public function getTotalCost(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalPrice();
        }
        return $total;
    }

    public function getItems(): array
    {
        return array_values($this->items);
    }
}

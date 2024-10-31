<?php

namespace Products;

class Cart
{
    private array $products = [];

    public function __construct(
        private string $id,
    ) {
    }

    public function addProductToCart(Product $product): void
    {
        if (isset($this->products[$product->getId()])) {
            $this->changeProductQuantityInCart($product, $product->getQuantity() * 2);
            echo 'Product with id {' . $product->getId() . '} already added. Quantity increased by product quantity value.';
            return;
        }

        $this->products[$product->getId()] = $product;
    }

    public function changeProductQuantityInCart(Product $product, int $quantity): void
    {
        if ($quantity <= 0) {
            echo 'Cant update Product {id=' . $product->getId() . '} with negative or zero value.';
            return;
        }

        if (isset($this->products[$product->getId()])) {
            $this->products[$product->getId()]->setQuantity($quantity);
        }
    }

    public function removeProductFromCart(Product $product): void
    {
        if (isset($this->products[$product->getId()])) {
            unset($this->products[$product->getId()]);
            return;
        }

        echo 'Product with id {' . $product->getId() . '} does not exist.';
    }

    public function calculateTotalCart(): float
    {
        return array_sum(array_map(fn($product) => ($product->getPrice() * $product->getQuantity()), $this->products));
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
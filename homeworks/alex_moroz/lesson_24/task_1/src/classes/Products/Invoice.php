<?php

namespace Products;

class Invoice extends Product
{
    private array $products;

    public function __construct(
        private string $id,
        private string $customer
    ) {
    }

    public function calculateProfit(): float
    {
        return array_sum(array_map(function (array $productData) {
            return ($productData['product']->calculateProfit()) * $productData['quantity'];
        }, $this->products));
    }

    public function changeQuantity($product, $newQuantity): void
    {
        $productId = $product->getId();
        $productData = &$this->products[$productId];
        $quantityBefore = isset($productData) ? $productData['quantity'] : null;

        if ($newQuantity <= 0 || ($quantityBefore + $newQuantity) <= 0) {
            unset($this->products[$productId]);
            echo 'Product with id={' . $productId . '} removed from Invoice.';
            return;
        }

        if (!isset($productData)) {
            echo 'There is no product with id ' . $product->getId() . '.';
            return;
        }

        $productData['quantity'] = $newQuantity;
        echo 'Product quantity in ' . get_class(
                $this
            ) . ' updated from ' . $quantityBefore . ' to ' . $newQuantity . '.';
    }

    public function addProduct(Product $product, int $quantity): void
    {
        $productData = $this->products[$product->getId()] ?? null;
        if ($quantity <= 0 && !isset($productData)) {
            echo 'Product with id {' . $product->getId() . '} wouldnt be added to Invoice because of 0 or negative quantity.';
            return;
        }

        if (isset($productData)) {
            $this->changeQuantity($product, (($productData['quantity']) + $quantity));
            echo 'Product with id {' . $product->getId() . '} already added.';
            return;
        }

        $this->products[$product->getId()] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }
}
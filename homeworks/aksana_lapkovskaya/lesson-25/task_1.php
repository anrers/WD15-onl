<?php

class Product {
    private string $name;
    private float $price;
    private string $description;
    private int $quantity;

    public function __construct(string $name, float $price, string $description, int $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
}

class Cart {
    /** @var array<string, array{product: Product, quantity: int}> */
    private array $items = [];

    public function addProduct(Product $product, int $quantity): void {
        if (isset($this->items[$product->getName()])) {
            $this->items[$product->getName()]['quantity'] += $quantity;
        } else {
            $this->items[$product->getName()] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
    }

    public function removeProduct(Product $product): void {
        unset($this->items[$product->getName()]);
    }

    public function updateProductQuantity(Product $product, int $quantity): void {
        if (isset($this->items[$product->getName()])) {
            $this->items[$product->getName()]['quantity'] = $quantity;
        }
    }

    public function getTotalPrice(): float {
        $total = 0.0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    /** @return array<string, array{product: Product, quantity: int}> */
    public function getItems(): array {
        return $this->items;
    }
}

$product1 = new Product("Soap", 7.0, "Very good smelling soap", 1);
$product2 = new Product("Shampoo", 34.0, "Makes hair really soft", 1);

$cart = new Cart();
$cart->addProduct($product1, 2);
$cart->addProduct($product2, 1);
echo "Total Price: " . $cart->getTotalPrice() . "\n";

$cart->updateProductQuantity($product1, 1);
echo "Updated Total Price: " . $cart->getTotalPrice() . "\n";

$cart->removeProduct($product2);
echo "Final Total Price: " . $cart->getTotalPrice() . "\n";

?>
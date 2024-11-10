<?php

class Product {
    private $name;
    private $price;
    private $description;
    private $quantity;

    public function __construct($name, $price, $description, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}

class Cart {
    private $items = [];

    public function addProduct(Product $product, $quantity) {
        if (isset($this->items[$product->getName()])) {
            $this->items[$product->getName()]['quantity'] += $quantity;
        } else {
            $this->items[$product->getName()] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
    }

    public function removeProduct(Product $product) {
        unset($this->items[$product->getName()]);
    }

    public function updateProductQuantity(Product $product, $quantity) {
        if (isset($this->items[$product->getName()])) {
            $this->items[$product->getName()]['quantity'] = $quantity;
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function getItems() {
        return $this->items;
    }
}

$product1 = new Product("Soap", 7, "Very good smelling soap", 1);
$product2 = new Product("Shampoo", 34, "Makes hair really soft", 1);

$cart = new Cart();
$cart->addProduct($product1, 2);
$cart->addProduct($product2, 1);
echo "Total Price: " . $cart->getTotalPrice() . "\n";

$cart->updateProductQuantity($product1, 1);
echo "Updated Total Price: " . $cart->getTotalPrice() . "\n";

$cart->removeProduct($product2);
echo "Final Total Price: " . $cart->getTotalPrice() . "\n";

?>
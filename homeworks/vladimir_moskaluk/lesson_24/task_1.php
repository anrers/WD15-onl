<?php

abstract class Product
{
    public readonly int $id;
    public readonly string $name;
    public readonly float $price;

    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateProfit(): float;
}

// Конкретный класс SimpleProduct, который наследует Product
class SimpleProduct extends Product
{
    public function calculateProfit(): float
    {
        // Например, прибыль равна 20% от цены продукта
        return $this->price * 0.2;
    }
}

// Класс Order, содержащий Product и реализующий calculateProfit для заказа
class Order
{
    public readonly int $id; // Уникальный идентификатор заказа
    private Product $product;
    private int $quantity;

    public function __construct(int $id, Product $product, int $quantity)
    {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function calculateProfit(): float
    {
        $profitPerItem = $this->product->calculateProfit();
        return $profitPerItem * $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}

// Класс Invoice, содержащий список продуктов и их количества
class Invoice
{
    public readonly int $id; // Уникальный идентификатор счета
    private string $customer;
    private array $products = [];

    public function __construct(int $id, string $customer)
    {
        $this->id = $id;
        $this->customer = $customer;
    }

    public function calculateProfit(): float
    {
        return array_reduce($this->products, function ($carry, $item) {
            $profitPerItem = $item['product']->calculateProfit();
            return $carry + $profitPerItem * $item['quantity'];
        }, 0.0);
    }

    public function addProduct(Product $product, int $quantity): void
    {
        $this->products[] = [
            'product' => $product,
            'quantity' => $quantity
        ];
    }

    public function setCustomerName(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getCustomerName(): string
    {
        return $this->customer;
    }
}

// Пример использования
$order = new Order(1, new SimpleProduct(1, "Product 1", 100.0), 5);
echo "Прибыль от первоначального заказа: " . $order->calculateProfit() . "\n";

// Меняем количество в заказе
$order->setQuantity(10);
echo "Обновленная прибыль от заказа (после изменения количества на 10): " . $order->calculateProfit() . "\n";

$invoice = new Invoice(1, "Дмитрий Петров");
$invoice->addProduct(new SimpleProduct(1, "Product A", 100.0), 2);
$invoice->addProduct(new SimpleProduct(2, "Product B", 200.0), 3);
echo "Invoice Profit: " . $invoice->calculateProfit() . "\n";

// Меняем имя покупателя
$invoice->setCustomerName("Иван Пупкин");
echo "Имя клиента: " . $invoice->getCustomerName() . "\n";
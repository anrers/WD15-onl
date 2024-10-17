<?php
class Car
{
    private string $brand;
    private string $model;
    private string $color;
    private int $year;

    /**
     * @param string $brand
     * @param string $model
     * @param string $color
     * @param int $year
     */
    public function __construct(string $brand, string $model, string $color, int $year)
    {
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setColor($color);
        $this->setYear($year);
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function printCarInfo(): void
    {
        echo 'Car info: ' .
            '[Brand: ' . $this->getBrand() . ', ' .
            'Model: ' . $this->getModel() . ', ' .
            'Color: ' . $this->getColor() . ', ' .
            'Year: ' . $this->getYear() . ']';
    }

    public function __toString(): string
    {
        return 'Car: {' . PHP_EOL .
            'Brand: {' . $this->getBrand() . '}' . PHP_EOL .
            'Model: {' . $this->getModel() . '}' . PHP_EOL .
            'Color: {' . $this->getColor() . '}' . PHP_EOL .
            'Year: {' . $this->getYear() . '}' . PHP_EOL;
    }
}
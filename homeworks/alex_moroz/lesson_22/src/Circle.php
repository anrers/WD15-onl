<?php
class Circle
{
    private float $radius;

    /**
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * pow($this->getRadius(), 2);
    }
}
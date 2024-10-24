<?php

class circle
{
    public int|float $radius;

    public function __construct(int|float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return (M_PI * $this->radius * $this->radius);
    }

}

$circle = new circle(6);
$squareCircle = $circle->calculateArea();
print_r($squareCircle);
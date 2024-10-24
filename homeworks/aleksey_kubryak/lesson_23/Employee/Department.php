<?php

class Department {
    public function __construct(private string $name) {}
    public function getName(): string{
        return $this->name;
    }
}
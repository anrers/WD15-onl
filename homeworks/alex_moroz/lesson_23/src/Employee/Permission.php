<?php

class Permission
{
    public function __construct(
        private string $id,
        private string $name,
    )
    {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
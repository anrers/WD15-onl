<?php

class Permission
{
    public function __construct(
        public int    $id,
        public string $name,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}


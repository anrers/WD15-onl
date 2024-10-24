<?php


class Department
{
    public function __construct(
        public string  $name,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}


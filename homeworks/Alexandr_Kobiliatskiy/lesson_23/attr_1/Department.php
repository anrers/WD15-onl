<?php
class Department
{
    public function __construct(
        protected string $id,
        protected string $name,
    ) {}

    public function getId() 
    {
        return $this->id;
    }

    public function getName() 
    {
        return $this->name;
    }
}


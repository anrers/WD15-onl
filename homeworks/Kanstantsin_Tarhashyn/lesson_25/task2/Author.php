<?php

class Author
{
    public function __construct(
        private int $id,
        private string $last_name,
    ) {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->last_name;
    }
}
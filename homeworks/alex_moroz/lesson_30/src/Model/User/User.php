<?php

namespace Model\User;

class User
{
    private int $id;
    private string $name;
    private int $age;
    private string $email;
    private int $genderId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getGenderId(): int
    {
        return $this->genderId;
    }

    public function setGenderId(int $genderId): void
    {
        $this->genderId = $genderId;
    }

    public function __toString(): string
    {
        return "User {name: {$this->name}, age: {$this->age}, email: {$this->email}}";
    }
}
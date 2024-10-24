<?php

class Person
{
    private string $name;
    private int $age;
    private string $sex;

    /**
     * @param string $name
     * @param int $age
     * @param string $sex
     */
    public function __construct(string $name, int $age, string $sex)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setSex($sex);
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

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    public function isAdult(): bool {
        return $this->getAge() >= 18;
    }
}
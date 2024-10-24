<?php

class man
{
    public string $name;
    public int $age;
    public string $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function isAdult()
    {
        if ($this->age >= 18) {
            return true;
        }
        return false;
    }
}

$man = new man("Bob", 19, "male");
$checkAge = $man->isAdult();
var_dump($checkAge);;
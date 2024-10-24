<?php

class Human {
    private $name;
    private $age;
    private $gender;

    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setName ($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function isAdult () {
        return $this->age >= 18;
    }

    public function showInfo () {
        $isAdult = $this->isAdult() ? "Adult" : "Not Adult";
        echo "Person Info: Name is {$this->name}, Age is  {$this->age}, Gender is  {$this->gender}, Status is {$isAdult}\n";
    }
}

$person = new Human("Donald", 25, "Male");
$person->showInfo();



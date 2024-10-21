<?php
class Human{
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

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function isAdult() {
        return $this->age >= 18;
    }

    public function displayInfo() {
        $adultStatus = $this->isAdult() ? "an adult" : "not an adult";
        echo "Person Info: Name: {$this->name}, Age: {$this->age}, Gender: {$this->gender}, Status: {$adultStatus}" . PHP_EOL;
    }
}

$person = new Human("Mike", 11, "Male");
$person->displayInfo();
<?php
class Student {
    private $firstName;
    private $lastName;
    private $age;
    private $course;

    public function __construct($firstName, $lastName, $age, $course) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->course = $course;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAge() {
        return $this->age;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function displayInfo() {
        echo "Student Info: {$this->firstName} {$this->lastName}, Age: {$this->age}, Course: {$this->course}" . PHP_EOL;
    }
}

$student = new Student("Just", "Noname", 99, 9);
$student->displayInfo();
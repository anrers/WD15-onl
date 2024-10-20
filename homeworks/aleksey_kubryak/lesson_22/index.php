<?php

/* Создать класс "Студент", у которого есть поля "имя", "фамилия", "возраст", "курс".
1. Конструктор класса, который принимает значения для всех полей и устанавливает их соответствующим образом.
2. Методы для получения значений полей (геттеры)
3. Методы для установки значений полей (сеттеры)
4. Методы для вывода информации о студенте
5. Вывести всю информацию */

class Student {
    private string $name;
    private string $surname;
    private int $age;
    private int $course;
    function __construct($name, $surname, $age, $course) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->course = $course;
    }
    public function getName() {
        return $this->name;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function getAge() {
        return $this->age;
    }    
    public function getCourse() {
        return $this->course;
    }
    public function setName($name): void {
        $this->name = $name;
    }
    public function setSurname($surname): void {
        $this->surname = $surname;
    }
    public function setAge($age): void {
        $this->age = $age;
    }    
    public function setCourse($course): void {
        $this->course = $course;
    }
    public function displayInfo() {
        echo "Имя: " . $this->getName() . PHP_EOL;
        echo "Фамилия: " . $this->getSurname() . PHP_EOL;
        echo "Возраст: " . $this->getAge() . PHP_EOL;
        echo "Курс: " . $this->getCourse() . PHP_EOL;
    }
}
$student = new Student("John", "Doe", 18, 1);
$student->displayInfo();

/* Создать класс "Автомобиль", у которого есть поля "марка", "модель", "цвет", "год выпуска"
1. Конструктор класса, который принимает значения для всех полей и устанавливает их соответствующим образом.
2. Методы для получения значений полей (геттеры)
3. Методы для установки значений полей (сеттеры)
4. Методы для вывода информации об автомобиле */

class Car {
    private string $make;
    private string $model;
    private string $color;
    private int $yearOfManufacture;

    function __construct($make, $model, $color, $yearOfManufacture) {
        $this->make = $make;
        $this->model = $model;
        $this->color = $color;
        $this->yearOfManufacture = $yearOfManufacture;
    }
    public function getMake() {
        return $this->make;
    }
    public function getModel() {
        return $this->model;
    }
    public function getColor() {
        return $this->color;
    }    
    public function getYearOfManufacture() {
        return $this->yearOfManufacture;
    }
    public function setMake($make): void {
        $this->make = $make;
    }
    public function setModel($model): void {
        $this->model = $model;
    }
    public function setColor($color): void {
        $this->color = $color;
    }    
    public function setYearOfManufacture($yearOfManufacture): void {
        $this->yearOfManufacture = $yearOfManufacture;
    }
    public function displayInfo() {
        echo "Марка: " . $this->getMake() . PHP_EOL;
        echo "Модель: " . $this->getModel() . PHP_EOL;
        echo "Цвет: " . $this->getColor() . PHP_EOL;
        echo "Год выпуска: " . $this->getYearOfManufacture() . PHP_EOL;
    }
}

/* Создать класс "Круг", у которого есть поле "радиус"
1.Конструктор класса, который принимает значение радиуса и устанавливает его соответствующим образом
2. Метод для вычисления площади круга - calculateArea() */

class Circle {
    private int|float $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function calculateArea() {
        return pi() * ($this->radius**2);
    }
}

/* Создать класс "Человек", у которого есть поля "имя", "возраст", "пол". Написать методы для работы с этими полями:
1. Конструктор класса, который принимает значения для всех полей и устанавливает их соответствующим образом
2. Метод для проверки, является ли человек совершеннолетним, - isAdult(), который возвращает true, если 
возраст человека больше или равен 18, и false в противном случае */

class Man {
    private string $name;
    private int $age;
    private string $gender;
    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }
    public function isAdult(): bool    {
        return $this->age >= 18;
    }
}
$person = new Man("Алексей", 20, "Мужской");
echo $person->isAdult();
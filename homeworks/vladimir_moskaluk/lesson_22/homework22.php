<?php

/*Создать класс "Студент", у которого есть поля "имя", "фамилия",
"возраст", "курс".
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом.
• Методы для получения значений полей (геттеры)
• Методы для установки значений полей (сеттеры)
• Методы для вывода информации о студенте
• Вывести всю информацию*/

class Student
{
    private string $firstName;            // без типизации свойств показывает ошибку, хотя код работает
    private string $lastName;
    private int $age;
    private int $course;

    public function __construct(string $firstName, string $lastName, int $age, int $course)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->course = $course;
    }
    // Для методов геттеров и сеттеров, если не указать возвращаемые типы и типы аргументов, показывает ошибку

    //Геттеры — методы, которые позволяют получать значения полей.
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    // Сеттеры — методы, которые позволяют устанавливать или изменять значения полей.
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setCourse(int $course): void
    {
        $this->course = $course;
    }

    //Метод для вывода всей информации о студенте с использованием геттеров
    public function displayInfo(): void
    {
        echo "Студент: " . $this->getFirstName() . " " . $this->getLastName() . ", Возраст: " . $this->getAge() . ", Курс: " . $this->getCourse() . "<br>";
    }
}

// Пример использования
$student = new Student("Иван", "Иванов", 20, 3);
$student->displayInfo();

// Изменение значений с помощью сеттеров. Т.к. если их не использовать, код показывает ошибку, что мы их не используем сеттеры.
$student->setFirstName("Николай");
$student->setLastName("Петров");
$student->setAge(22);
$student->setCourse(4);

$student->displayInfo();


/*Создать класс "Автомобиль", у которого есть поля "марка",
"модель", "цвет", "год выпуска"
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом.
• Методы для получения значений полей (геттеры)
• Методы для установки значений полей (сеттеры)
• Методы для вывода информации об автомобиле*/

class Car
{
    private string $brand;
    private string $model;
    private string $color;
    private int $year;


    public function __construct(string $brand, string $model, string $color, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->year = $year;
    }

    // Геттеры
    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    // Сеттеры
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    //Метод для вывода всей информации об автомобиле с использованием геттеров
    public function displayInfo(): void
    {
        echo "Автомобиль: " . $this->getBrand() . " " . $this->getModel() . ", Цвет: " . $this->getColor() . ", Год выпуска: " . $this->getYear() . "<br>";
    }
}

$car = new Car("Toyota", "Camry", "Черный", 2020);
$car->displayInfo();


$car->setBrand("Volvo");
$car->setModel("S60");
$car->setColor("Серебро");
$car->setYear(2024);

$car->displayInfo();

/*Создать класс "Круг", у которого есть поле "радиус"
• Конструктор класса, который принимает значение радиуса и
устанавливает его соответствующим образом
• Метод для вычисления площади круга - calculateArea()*/

class Circle
{
    private float $radius;


    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    // Метод для вычисления площади круга
    public function calculateArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function displayInfo(): void
    {
        echo "Радиус круга: " . $this->getRadius() . ", Площадь круга: " . $this->calculateArea() . " м²" . "<br>";
    }
}


$circle = new Circle(5);
$circle->displayInfo();

$circle->setRadius(2);

$circle->displayInfo();


/*Создать класс "Человек", у которого есть поля "имя", "возраст",
"пол". Написать методы для работы с этими полями:
• Конструктор класса, который принимает значения для всех полей
и устанавливает их соответствующим образом
• Метод для проверки, является ли человек совершеннолетним, -
isAdult(), который возвращает true, если возраст человека больше
или равен 18, и false в противном случае*/

class Person
{
    private string $name;
    private int $age;
    private string $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    // Геттеры
    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    // Сеттеры
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    // Проверка, является ли человек совершеннолетним
    public function isAdult(): bool
    {
        return $this->age >= 18;
    }

    // Метод для вывода информации о человеке с использованием геттеров
    public function displayInfo(): void
    {
        echo "Человек: " . $this->getName() . ", Возраст: " . $this->getAge() . ", Пол: " . $this->getGender() . ", Совершеннолетний: " . ($this->isAdult() ? "Да" : "Нет") . "<br>";
    }
}

// Пример использования
$person = new Person("Анна", 25, "женский");
$person->displayInfo();


//Изменения с использованием сеттеров
$person->setName("Виктор");
$person->setAge(17);
$person->setGender("мужской");
$person->displayInfo();


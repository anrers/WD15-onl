<?php
//Создать класс "Студент", у которого есть поля "имя", "фамилия",
//"возраст", "курс".
//• Конструктор класса, который принимает значения для всех полей
//и устанавливает их соответствующим образом.
//• Методы для получения значений полей (геттеры)
//• Методы для установки значений полей (сеттеры)
//• Методы для вывода информации о студенте
//• Вывести всю информацию
class Student
{
    public function __construct(
        public string $name,
        public string $surname,
        public int    $age,
        public int    $class,
    )
    {
    }

    //Методы для получения значений полей (геттеры)
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getClass()
    {
        return $this->class;
    }

    // Методы для установки значений полей (сеттеры)
    public function setName()
    {
        $this->name = $name;
    }

    public function setSurname()
    {
        $this->surname = $surname;
    }

    public function setAge()
    {
        $this->age = $age;
    }

    public function setClass()
    {
        $this->class = $class;
    }

    public function printStudentInfo()
    {
        echo "Имя: " . $this->name . "\nФамилия: " . $this->surname . "\nВозраст: " . $this->age . "\nКурс: " . $this->class . "\n";
    }
}

$student = new Student('Pavel', 'Popov', 55, 5);
$student->printStudentInfo();

//Создать класс "Автомобиль", у которого есть поля "марка",
//"модель", "цвет", "год выпуска"
//• Конструктор класса, который принимает значения для всех полей
//и устанавливает их соответствующим образом.
//• Методы для получения значений полей (геттеры)
//• Методы для установки значений полей (сеттеры)
//• Методы для вывода информации об автомобиле

class Car
{
    public function __construct(
        public string $brand,
        public string $model,
        public string $color,
        public int    $year,
    )
    {
    }

    //Методы для получения значений полей (геттеры)
    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getYear()
    {
        return $this->year;
    }

    // Методы для установки значений полей (сеттеры)
    public function setBrand()
    {
        $this->brand = $brand;
    }

    public function setModel()
    {
        $this->model = $model;
    }

    public function setColor()
    {
        $this->color = $color;
    }

    public function setYear()
    {
        $this->year = $year;
    }

    public function printCarInfo()
    {
        echo "Марка авто: " . $this->brand . "\nМодель: " . $this->model . "\nЦвет: " . $this->color . "\nГод выпуска: " . $this->year . "\n";
    }
}

$car = new Car('BMW', '216D', "Black", 2015);
$car->printCarInfo();

//Создать класс "Круг", у которого есть поле "радиус"
//• Конструктор класса, который принимает значение радиуса и
//устанавливает его соответствующим образом
//• Метод для вычисления площади круга - calculateArea()

class Circle
{
    public function __construct(
        public string $radius,
    )
    {
    }

    public function calculateArea()
    {
        return round(2 * ($this->radius) * pi(), 2);
    }
}

$circle = new Circle(14);
echo "Площадь круга равна: " . $circle->calculateArea() . PHP_EOL;

//Создать класс "Человек", у которого есть поля "имя", "возраст",
//"пол". Написать методы для работы с этими полями:
//• Конструктор класса, который принимает значения для всех полей
//и устанавливает их соответствующим образом
//• Метод для проверки, является ли человек совершеннолетним, -
//isAdult(), который возвращает true, если возраст человека больше
//или равен 18, и false в противном случае

class Human
{
    public function __construct(
        public string $name,
        public string $age,
        public string $gender,
    )
    {
    }

    public function isAdult(): bool
    {
        return $this->age >= 18;
    }
}

$human = new Human("Max", 45, "M");
var_dump($human->isAdult());
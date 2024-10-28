<?php
class Student
{
    public string $name;
    public string $surname;
    public int $age;
    public int $class;

    //• Конструктор класса, который принимает значения для всех полей
    public function __construct(string $name, string $surname, int $age, int $class)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->class = $class;
    }

    // Методы для получения значений полей (геттеры)
    function getName()
    {
        return $this->name;
    }

    function getSurname()
    {
        return $this->surname;
    }

    function getAge()
    {
        return $this->age;
    }

    function getClass()
    {
        return $this->class;
    }

    //• Методы для установки значений полей (сеттеры)
    function setName($name)
    {
        $this->name = $name;
    }

    function setSurname($surname)
    {
        $this->surname = $surname;
    }

    function setAge($age)
    {
        $this->age = $age;
    }

    function setClass($class)
    {
        $this->class = $class;
    }

    // Методы для вывода информации о студенте
    function aboutStudent(): void
    {
        echo "Student's name: {$this->name}\n Student's surname: {$this->surname}\n Student's age: {$this->age}\n Student's class: {$this->class}\n";
    }
}



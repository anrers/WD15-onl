<?php
//Класс "Department" (Отдел) со следующими свойствами:
//• $name - название отдела
//Класс "Department" должен иметь следующие методы:
//• __construct($name) - конструктор класса, который принимает
//идентификатор и название отдела в качестве аргументов и устанавливает их соответствующим образом
// • getName() - возвращает название отдела

class Department
{
    protected string $name;

    public function __conctruct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$salesDepartment = new Department('Sales');
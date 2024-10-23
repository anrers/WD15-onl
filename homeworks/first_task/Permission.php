<?php
//Класс "Permission" (Разрешение) со следующими свойствами:
//• $name - название разрешения
//Класс "Permission" должен иметь следующие методы:
//• __construct($id, $name) - конструктор класса, который принимает
//идентификатор и название разрешения в качестве аргументов и устанавливает их соответствующим образом
//• getId() - возвращает идентификатор разрешения
//• getName() - возвращает название разрешения

class Permission
{
    protected $name;
    protected $id;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}


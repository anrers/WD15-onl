<?php
require "Permission.php";
//Класс "Role" (Роль) со следующими свойствами:
//• $name - название роли
//• $permissions - массив объектов класса "Permission", которые имеются у данной роли

//Класс "Role" должен иметь следующие методы:
//• __construct($name) - конструктор класса, который принимает идентификатор и название роли в качестве аргументов и
//устанавливает их соответствующим образом
//• getName() - возвращает название роли
//• getPermissions() - возвращает массив объектов класса "Permission", которые имеются у данной роли
//• addPermission($permission) - добавляет объект класса "Permission" в массив $permissions
//• removePermission($permission) - удаляет объект класса "Permission" из массива $permissions

class Role
{
    protected string $name;
    protected $permissions = array();

    function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function addPermission(Permission $permission)
    {
        if (!in_array($permission, $this->permissions)) {
            $this->permissions[] = $permission;
        }
    }

    public function removePermission(Permission $permission)
    {
        if (($key = array_search($permission, $this->permissions)) !== false) {
            unset($this->permissions[$key]);
        }
    }
}





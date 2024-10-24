<?php
require "Role.php";
require "Department.php";
//Класс "Employee" (Сотрудник) с следующими свойствами:
//• $name - имя сотрудника
//• $email - адрес электронной почты сотрудника
//• $password - пароль для входа в систему
//• $department - отдел, в котором работает сотрудник
//• $role - роль сотрудника (администратор, менеджер, обычный пользователь и т.д.)

//Класс "Employee" должен иметь следующие методы:
//• __construct($name, $email, $password, $department, $role) -
//конструктор класса, который принимает все свойства сотрудника в
//качестве аргументов и устанавливает их соответствующим образом
//• getName() - возвращает имя сотрудника
//• getEmail() - возвращает адрес электронной почты сотрудника
//• getPassword() - возвращает пароль сотрудника
//• getDepartment() - возвращает отдел, в котором работает сотрудник
//• getRole() - возвращает роль сотрудника

class Employee
{
    protected $name;
    protected $email;
    protected $department;
    protected $role;
    protected $password;

    public function __construct($name, $email, Department $department, Role $role, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->department = $department;
        $this->role = $role;
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getPassword()
    {
        return $this->password;
    }
}


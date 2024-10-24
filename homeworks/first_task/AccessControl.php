<?php
require 'Employee.php';

//Класс "AccessControl" должен иметь следующие методы:
//• __construct($roles, $permissions) - конструктор класса, который принимает массив объектов класса "Role" и массив объектов класса
//"Permission" в качестве аргументов и устанавливает их соответствующим образом
//• checkAccess($employee, $permission) - проверяет, имеет ли сотрудник $employee доступ к разрешению $permission. Метод
//должен вернуть true, если сотрудник имеет доступ, и false в противном случае

class AccessControl
{
    public function __construct(
        public Role       $roles,
        public Permission $permissions
    )
    {
    }

    public function checkAccess(Employee $employee, Permission $permission): bool
    {
        $employeeRole = $employee->getRole();
        $permissionRole = $employeeRole->getPermissions();

        if (in_array($permission, $permissionRole)) {
            return true;
        } else {
            return false;
        }

    }

}

$sales = new Department('sales');
$newRole = new Role('saler');
$newPermission = new Permission(1, 'salesDepartment');
$oldPerm = new Permission(2, 'salesDepartment');
$newRole->addPermission($newPermission);

$newPerson = new Employee('bob', 'email', $sales, $newRole, 4588);

$check = new AccessControl($newRole, $newPermission);
$result = $check->checkAccess($newPerson, $newPermission);
var_dump($result);


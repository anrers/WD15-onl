<?php
require_once 'C:\OSPanel\home\homework-23\attr_1\Role.php';
require_once 'C:\OSPanel\home\homework-23\attr_1\Employee.php';
require_once 'C:\OSPanel\home\homework-23\attr_1\Permission.php';


class AccessControl
{
    public function __construct(
        public array $arrayPermissionObjects, //Массив с объектами доступов
        public array $arrayRoleObjects, //Массив с объектами ролей
        public array $arrayEmployeeObjects, //Массив с объектами сотрудников. В ТЗ нет, но без него никак.
    ) {}

    public function checkAccess($employee, $permission)
    {
        $employeeObject = null; //Объект сотрудника который нужно найти по введеным именам
        $roleObject = null; //Объект роли который нужно найти по введеным именам
        $permissionObjecn = null; //Объект допуска который нужно найти по введеным именам

        foreach ($this->arrayEmployeeObjects as $employeeObjects) {
            if ($employeeObjects->name == $employee) {
                    $employeeObject = $employeeObjects; //Нашли объект сотрудника по имени
            }  
        }
        foreach ($this->arrayRoleObjects as $roleObjects) {
            if ($employeeObject->role == $roleObjects->name) {
                    $roleObject = $roleObjects; //Нашли объект роли
            }
        }
        foreach ($this->arrayPermissionObjects as $PermissionObjects) {
            if ($PermissionObjects->name == $permission) {
                    $permissionObjecn = $PermissionObjects; //Нашли объект разрешения
            }
        }
        if(in_Array ($permissionObjecn, $roleObject->permissions)) {
            return true;
        } else {
            return false;
        }
    }
}


//Проверка
$ecsamination = new AccessControl($arrayPermissionObjects, $arrayRoleObjects, $arrayEmployeeObjects);
var_dump ($ecsamination->checkAccess('Vasiliy Alibabaewich', 'Warehouse read'));
//Работает!!!!
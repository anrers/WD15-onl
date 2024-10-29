<?php
require_once 'C:\OSPanel\home\homework-23\attr_1\Permission.php';

class Role
{
    public $rolesNameOnly =[
        'Dominant male', 
        'Manager', 
        'Chief accountant', 
        'Accountant', 
        'Head of HR Department', 
        'HR', 
        'Head of warehouse', 
        'Storekeeper', 
        'Head of garage', 
        'Mechanic',
        'Head of IT Department', 
        'Unhappy of IT Department'
    ];

    public function __construct(
        public int $id,
        public string $name,
        public array $permissions,

    ) {
        if (!in_Array ($this->name, $this->rolesNameOnly)) {
            echo "Введите правильное название отдела";
            die;
        }
    }

    

    public function getId() 
    {
        return $this->id;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getPermissions() 
    {
        return $this->permissions;
    }

    public function addPermission($objectPermission)
    {
        array_push ($this->permissions, $objectPermission);
    }

    public function removePermission($objectPermission)
    {
       unset($this->permissions[array_search ($objectPermission, $this->permissions)]);
    }
}


//Экземпляры класса
$dominantMale = new Role(1, 'Dominant male', $dominantMalePermissions);
$managemant = new Role(2, 'Manager', $managemantPermissions);
$chiefAccountant = new Role(3, 'Chief accountant', $chiefAccountantPermissions);
$accountant = new Role(4, 'Accountant', $accountantPermissions);
$headOfHRDepartment = new Role(5, 'Head of HR Department', $headOfHRDepartmentPermissions);
$HRDepartment = new Role(6, 'HR', $HRDepartmentPermissions);
$headOfwarehouse = new Role(7, 'Head of warehouse', $headOfwarehousePermissions);
$storekeeper = new Role(8, 'Storekeeper', $storekeeperPermissions);
$headOfgarage = new Role(9, 'Head of garage', $headOfgaragePermissions);
$mechanic = new Role(10, 'Mechanic', $mechanicPermissions);
$headOfITDepartment = new Role(11, 'Head of IT Department', $headOfITDepartmentPermissions);
$unhappyOfITDepartment =new Role(12, 'Unhappy of IT Department', $unhappyOfITDepartmentPermissions);

//Массив экземпляров класса
$arrayRoleObjects = [
    $dominantMale, 
    $managemant, 
    $chiefAccountant, 
    $accountant, 
    $headOfHRDepartment,
    $HRDepartment,
    $headOfwarehouse,
    $storekeeper,
    $headOfgarage,
    $mechanic,
    $headOfITDepartment,
    $unhappyOfITDepartment,
];


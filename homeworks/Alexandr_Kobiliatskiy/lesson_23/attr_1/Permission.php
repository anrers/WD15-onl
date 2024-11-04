<?php
class Permission
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}

    public function getId() 
    {
        return $this->id;
    }

    public function getName() 
    {
        return $this->name;
    }
}



//Экземпляры классов по допускам
$noRestrictions = new Permission(1, 'No restrictions');
$managemantRead = new Permission(2, 'Managemant read');
$managemantEnteringData = new Permission(3, 'Managemant entering data');
$accountingRead = new Permission(4, 'Accounting read');
$accountingEnteringData = new Permission(5, 'Accounting entering data');
$HRDepartmentRead = new Permission(6, 'HR department read');
$HRDepartmentEnteringData = new Permission(7, 'HR department entering data');
$warehouseRead = new Permission(8, 'Warehouse read');
$warehouseEnteringData = new Permission(9, 'Warehouse entering data');
$garageRead = new Permission(10,'Garage read');
$garageEnteringData = new Permission(11,'Garage entering data');
$ITDepartmentRead = new Permission(12,'IT department read');
$ITDepartmentEnteringData = new Permission(13,'IT department entering data');

//Массивы экземпляров допусков по должностям
$dominantMalePermissions = [$managemantRead, $accountingRead, $HRDepartmentRead, $warehouseRead, $garageRead, $ITDepartmentRead];
$managemantPermissions = [$managemantRead, $managemantEnteringData, $accountingRead, $HRDepartmentRead, $warehouseRead, $garageRead, $ITDepartmentRead];
$chiefAccountantPermissions = [$managemantRead, $accountingRead, $HRDepartmentRead, $warehouseRead, $garageRead, $ITDepartmentRead];
$accountantPermissions = [$managemantRead, $accountingEnteringData, $accountingRead, $HRDepartmentRead, $warehouseRead, $garageRead, $ITDepartmentRead];
$headOfHRDepartmentPermissions = [$HRDepartmentRead];
$HRDepartmentPermissions = [$HRDepartmentRead, $HRDepartmentEnteringData];
$headOfwarehousePermissions = [$warehouseRead];
$storekeeperPermissions = [$warehouseRead, $warehouseEnteringData];
$headOfgaragePermissions = [$warehouseRead, $garageRead];
$mechanicPermissions = [$warehouseRead, $garageRead, $garageEnteringData];
$headOfITDepartmentPermissions = [$noRestrictions];
$unhappyOfITDepartmentPermissions = [$noRestrictions];

//Массив объектов классов
$arrayPermissionObjects = [
    $noRestrictions,
    $managemantRead,
    $managemantEnteringData,
    $accountingRead,
    $accountingEnteringData,
    $HRDepartmentRead,
    $HRDepartmentEnteringData,
    $warehouseRead,
    $warehouseEnteringData,
    $garageRead,
    $garageEnteringData,
    $ITDepartmentRead,
    $ITDepartmentEnteringData,
];


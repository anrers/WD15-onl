<?php

require_once 'AccessControl.php';
require_once 'Department.php';
require_once 'Employee.php';
require_once 'Permission.php';
require_once 'Role.php';

$firstAction = new Permission(1, 'RolesChange');
$secondAction = new Permission(2, 'PriceChange');
$thirdAction = new Permission(3, 'SalesActivityChange');

$permissions = [$firstAction, $secondAction, $thirdAction];

$fullRole = new Role('Admin');
$fullRole->addPermissions($firstAction);
$fullRole->addPermissions($secondAction);
$fullRole->addPermissions($thirdAction);

$salesManagerRole = new Role('Sales manager');
$salesManagerRole->addPermissions($secondAction);

$marketingRole = new Role('Marketing');
$marketingRole->addPermissions($thirdAction);

$usersRoles = [$fullRole, $salesManagerRole, $marketingRole];

$itDepartment = new Department('It');
$salesDepartment = new Department('Sales');
$marketingDepartment = new Department('Marketing');

$itDepEmployee = new Employee('Pavel', 'asava@gmail.com', '123', $itDepartment, $fullRole);
$salesDepEmployee = new Employee('Alex', 'adasasf@gmail.com', '123', $salesDepartment, $salesManagerRole);
$marketingDepEmployee = new Employee('Marketing', 'asa2va@gmail.com', '123', $marketingDepartment, $marketingRole);


$accessCheck = new AccessControl($usersRoles, $permissions);

echo ($accessCheck->checkAccess($itDepEmployee, $secondAction) ? 'Доступ предоставлен' : 'Доступ заблокирован') . PHP_EOL;
echo ($accessCheck->checkAccess($salesDepEmployee, $secondAction) ? 'Доступ предоставлен' : 'Доступ заблокирован') . PHP_EOL;
echo ($accessCheck->checkAccess($marketingDepEmployee, $secondAction) ? 'Доступ предоставлен' : 'Доступ заблокирован') . PHP_EOL;
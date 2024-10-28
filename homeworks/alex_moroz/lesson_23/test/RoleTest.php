<?php

require_once '../src/Employee/Permission.php';
require_once '../src/Employee/Role.php';


$permissionOne = new Permission('permission_1', 'Permission One');
$permissionTwo = new Permission('permission_2', 'Permission Two');
$permissionThree = new Permission('permission_3', 'Permission Three');

$testRole = new Role('Test Role');

//role doesn't have any permissions
assert(0 == count($testRole->getPermissions()));

//add new permission to role, check quantity - must be 1
assert(1 == count($testRole->addPermission($permissionOne)));
assert(1 == count($testRole->getPermissions()));

//add new permission to role, check quantity - must be 2
$testRole->addPermission($permissionTwo);
assert(2 == count($testRole->getPermissions()));

//add already added permission to role, check quantity  - must be 2
$testRole->addPermission($permissionTwo);
assert(2 == count($testRole->getPermissions()));

//remove already added permission to role, check quantity  - must be 1
$testRole->removePermission($permissionTwo);
assert(1 == count($testRole->getPermissions()));

//remove not added permission, check quantity  - must be 1
$testRole->removePermission($permissionTwo);
assert(1 == count($testRole->getPermissions()));

$testRole->addPermission($permissionThree);
assert(2 == count($testRole->getPermissions()));
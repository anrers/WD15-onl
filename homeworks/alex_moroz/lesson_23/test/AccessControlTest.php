<?php
require_once '../src/Employee/Department.php';
require_once '../src/Employee/Permission.php';
require_once '../src/Employee/Role.php';
require_once '../src/Employee/Employee.php';
require_once '../src/Employee/AccessControl.php';

testCheckAccess();
function testCheckAccess(): void
{
    $addPermission = new Permission('add_permission', 'Add permission to the Role');
    $removePermission = new Permission('remove_permission', 'Remove permission from the Role');

    $salesDepartment = new Department('Sales Department');
    $developmentDepartment = new Department('Development Department');
    $marketingDepartment = new Department('Marketing Department');

    $adminRole = new Role('Admin');
    $adminRole->addPermission($addPermission);
    $adminRole->addPermission($removePermission);

    $headOfDepartmentRole = new Role('Head of Department');
    $headOfDepartmentRole->addPermission($addPermission);
    $headOfDepartmentRole->addPermission($removePermission);

    $deputyChiefOfDepartmentRole = new Role('Deputy chief of Department');
    $deputyChiefOfDepartmentRole->addPermission($addPermission);

    $userRole = new Role('User');

    $admin = new Employee('Mett', 'mett@example.com', 'l!s!12345', $developmentDepartment, $adminRole);
    $sysAdmin = new Employee('James', 'james@example.com', 'j1m*4_12345', $developmentDepartment, $userRole);

    $headOfSalesDepartment = new Employee('Bart', 'bartn@example.com', 'B14t1!12345', $developmentDepartment, $headOfDepartmentRole);
    $deputyChiefOfSalesDepartment = new Employee('Lisa', 'lisa@example.com', 'l1s0*12345', $marketingDepartment, $deputyChiefOfDepartmentRole);
    $seller = new Employee('Maggie', 'maggie@example.com', '12345_mag*21e', $marketingDepartment, $userRole);

    $headOfMarketingDepartment = new Employee('Marge', 'marge@example.com', '12M1rg!!345', $developmentDepartment, $headOfDepartmentRole);
    $marketer = new Employee('Homer', 'john@doe.com', 'homer_12345', $salesDepartment, $userRole);

    $accessControl = new AccessControl([$adminRole, $headOfDepartmentRole, $deputyChiefOfDepartmentRole, $userRole], [$addPermission, $removePermission]);
    $accessControl->checkAccess($admin, $addPermission);

    assert(true == $accessControl->checkAccess($admin, $addPermission));
    assert(true == $accessControl->checkAccess($admin, $removePermission));
    assert(true == $accessControl->checkAccess($headOfSalesDepartment, $addPermission));
    assert(true == $accessControl->checkAccess($headOfSalesDepartment, $removePermission));
    assert(true == $accessControl->checkAccess($headOfMarketingDepartment, $addPermission));
    assert(true == $accessControl->checkAccess($headOfMarketingDepartment, $removePermission));

    assert(true == $accessControl->checkAccess($deputyChiefOfSalesDepartment, $addPermission));
    assert(false == $accessControl->checkAccess($deputyChiefOfSalesDepartment, $removePermission));

    assert(false == $accessControl->checkAccess($sysAdmin, $addPermission), 'Current ' . $sysAdmin . ' musn\'t have access to current permission {' . $addPermission) . '}.';
    assert(false == $accessControl->checkAccess($sysAdmin, $removePermission), 'Current ' . $sysAdmin . ' musn\'t have access to current permission {' . $removePermission) . '}.';
    assert(false == $accessControl->checkAccess($seller, $addPermission), 'Current ' . $seller . ' musn\'t have access to current permission {' . $addPermission) . '}.';
    assert(false == $accessControl->checkAccess($seller, $removePermission), 'Current ' . $seller . ' musn\'t have access to current permission {' . $removePermission) . '}.';
    assert(false == $accessControl->checkAccess($marketer, $addPermission), 'Current ' . $marketer . ' musn\'t have access to current permission {' . $addPermission) . '}.';
    assert(false == $accessControl->checkAccess($marketer, $removePermission), 'Current ' . $marketer . ' musn\'t have access to current permission {' . $removePermission) . '}.';

    $testEmployeeWithUnknownRole = new Employee('Test', 'test@axample', '12345', $developmentDepartment, new Role('tester'));
    assert(false == $accessControl->checkAccess($testEmployeeWithUnknownRole, $addPermission), 'Current '. $testEmployeeWithUnknownRole . ' has unknown role}.');
    assert(false == $accessControl->checkAccess($sysAdmin, $removePermission), 'Current '. $testEmployeeWithUnknownRole . ' has unknown role}.');

    $testPermission = new Permission('unknown_permission', 'Unknown permission');
    assert(false == $accessControl->checkAccess($admin, $testPermission), 'Unknown permission: ' . $testPermission);
}

<?php

require_once 'Employee.php';
require_once 'Permission.php';
require_once 'Role.php';

class AccessControl {
    public function __construct(private array $roles, private array $permissions) {}

    public function checkAccess(Employee $employee, Permission $permission): bool {
        if ($employee->getRole()) {
            foreach ($employee->getRole() as $role) {
                if (in_array($permission, $role->permissions, true)) {
                    return true;
                }
            }
        }
        return false;
    }
}
<?php

class AccessControl
{
    public function __construct(
        private array $roles,
        private array $permissions
    )
    {}

    public function checkAccess(Employee $employee, Permission $permission)
    {
        $employeeRole = $employee->getRole();
        $employeePermissions = $employeeRole->getPermissions();
        if (in_array($employeeRole, $this->roles) && in_array($permission, $this->permissions) &&
            in_array($permission, $employeePermissions)) {
            return true;
        }
        return false;
    }
}
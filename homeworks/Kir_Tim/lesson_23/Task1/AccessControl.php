<?php

require_once 'Role.php';
require_once 'Permission.php';

class AccessControl
{

    public function __construct(
        public array $roles,
        public array $permissions,
    )
    {
    }

    public function checkAccess($employee, $permission): bool
    {
        $checkRole = $employee->getRole();
        foreach ($checkRole->getPermissions() as $accessPermission) {
            if ($accessPermission->getName() === $permission->getName()) {
                return true;
            }
        }
        return false;
    }
}

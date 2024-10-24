<?php

class AccessControl
{
    private array $roles = [];
    private array $permissions = [];

    // добавление роли
    public function addRole(Role $role): void
    {
        $this->roles[$role->getName()] = $role;
    }

    // добавление разрешения
    public function addPermission(Permission $permission): void
    {
        $this->permissions[$permission->getName()] = $permission;
    }

    // проверка доступа
    public function checkAccess(Employee $employee, Permission $permission): bool
    {
        return $employee->hasPermission($permission);
    }

    // получения всех ролей
    public function getRoles(): array
    {
        return $this->roles;
    }

    // получение всех разрешений
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    // проверка существует ли роль
    public function hasRole(string $roleName): bool
    {
        return isset($this->roles[$roleName]);
    }

    // проверка существует ли разрешение
    public function hasPermission(string $permissionName): bool
    {
        return isset($this->permissions[$permissionName]);
    }
}

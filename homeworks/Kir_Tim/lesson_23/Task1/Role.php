<?php

require_once 'Permission.php';
class Role
{
    private array $permissions;
    public function __construct(
        private string  $name,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getPermissions(): array {
        return $this->permissions;
    }
    public function addPermissions($permission): void
    {
        $this->permissions[]= $permission;
    }
    public function removePermissions($permission): void
    {
       unset($this->permissions[array_search($permission,$this->permissions)]);
    }
}


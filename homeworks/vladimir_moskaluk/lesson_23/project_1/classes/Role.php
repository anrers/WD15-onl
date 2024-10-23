<?php

class Role
{
    private string $name;
    private array $permissions = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addPermission(Permission $permission): void
    {
        $this->permissions[$permission->getName()] = $permission;
    }

    public function removePermission(Permission $permission): void
    {
        unset($this->permissions[$permission->getName()]);
    }

    public function hasPermission(Permission $permission): bool
    {
        return isset($this->permissions[$permission->getName()]);
    }
}

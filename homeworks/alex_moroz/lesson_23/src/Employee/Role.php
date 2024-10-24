<?php

class Role
{
    private array $permissions;
    public function __construct(
        private string $name,
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPermissions(): array
    {
        if (empty($this->permissions))
        {
            return [];
        }
        return $this->permissions;
    }

    public function addPermission(Permission $permition): array
    {
        if (empty($this->permissions) || !in_array($permition, $this->permissions)) {
            $this->permissions[] = $permition;
        }
        return $this->getPermissions();
    }

    public function removePermission($permition): void
    {
        if (in_array($permition, $this->permissions)) {
            unset($this->permissions[array_search($permition, $this->permissions)]);
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
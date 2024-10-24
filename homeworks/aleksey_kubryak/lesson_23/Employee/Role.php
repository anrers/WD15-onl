<?php

require_once 'Permission.php';

class Role {
    private array $permissions = [];
    public function __construct(private string $name) {}
    public function getName(): string {
        return $this->name;
    }
    public function getPermissions(): array {
        return $this->permissions;
    }
    public function addPermission(Permission $permission): void {
        $this->permissions[] = $permission;
    }
    public function removePermission(Permission $permission): void {
        foreach ($this->permissions as $key => $value) {
            if ($value === $permission) {
                unset($this->permissions[$key]);
                break;
            }
        }
    }
}
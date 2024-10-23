<?php

class Employee
{
    private string $name;
    private string $email;
    private string $password;
    private Department $department;
    private Role $role;

    public function __construct(string $name, string $email, string $password, Department $department, Role $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->department = $department;
        $this->role = $role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDepartment(): string
    {
        return $this->department->getName();
    }

    public function getRole(): string
    {
        return $this->role->getName();
    }

    public function hasPermission(Permission $permission): bool
    {
        return $this->role->hasPermission($permission);
    }
}

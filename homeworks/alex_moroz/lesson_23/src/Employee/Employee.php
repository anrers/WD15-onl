<?php

class Employee
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private Department $department,
        private Role $role
    )
    {}

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

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function __toString(): string
    {
        return 'Employee {name: ' . $this->name .
            '; email: ' . $this->email .
            '; depatment: ' . $this->department .
            '; role: ' . $this->role .
            '}';
    }
}
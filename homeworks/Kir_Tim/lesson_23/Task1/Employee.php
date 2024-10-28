<?php

require_once 'Department.php';
require_once 'Role.php';

class Employee
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public        $department,
        public        $role,
    )
    {
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

    public function getDepartment()
    {
        return $this->department;
    }

    public function getRole()
    {
        return $this->role;
    }
}


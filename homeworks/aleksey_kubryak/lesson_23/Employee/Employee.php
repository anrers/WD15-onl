<?php

require_once 'Department.php';
require_once 'Role.php';

class Employee {
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private Department $department,
        private Role $role
    ) {}
    public function getName(): string {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getDepartment(): Department {
        return $this->department;
    }
    public function getRole(): Role {
        return $this->role;
    }
}
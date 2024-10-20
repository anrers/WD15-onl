<?php

class Employee {
    private $name;
    private $email;
    private $password;
    private $department;
    private $role;

    public function __construct($name, $email, $password, $department, $role) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->department = $department;
        $this->role = $role;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getRole() {
        return $this->role;
    }
}

class Department {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Permission {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

class Role {
    private $name;
    private $permissions = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function addPermission($permission) {
        $this->permissions[] = $permission;
    }

    public function removePermission($permission) {
        $index = array_search($permission, $this->permissions);
        if ($index !== false) {
            unset($this->permissions[$index]);
        }
    }
}

class AccessControl {
    private $roles = [];
    private $permissions = [];

    public function __construct($roles, $permissions) {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    public function checkAccess($employee, $permission) {
        $role = $employee->getRole();
        foreach ($role->getPermissions() as $rolePermission) {
            if ($rolePermission->getName() === $permission->getName()) {
                return true;
            }
        }
        return false;
    }
}

$viewSales = new Permission(1, 'View Sales');
$manageUsers = new Permission(2, 'Manage Users');

$adminRole = new Role('Admin');
$adminRole->addPermission($viewSales);
$adminRole->addPermission($manageUsers);

$userRole = new Role('User');
$userRole->addPermission($viewSales);

$salesDepartment = new Department('Sales');
$developmentDepartment = new Department('Development');

$employee1 = new Employee('Random Person', 'random_person@gmail.com', 'easypass', $salesDepartment, $adminRole);
$employee2 = new Employee('NotRandom Person', 'not_random_person@gmail.com', 'multipass', $developmentDepartment, $userRole);

$roles = [$adminRole, $userRole];
$permissions = [$viewSales, $manageUsers];

$accessControl = new AccessControl($roles, $permissions);

echo "Does Random have access to 'View Sales'? " . ($accessControl->checkAccess($employee1, $viewSales) ? 'True' : 'False') . "\n";
echo "Does NonRandom have access to 'Manage Users'? " . ($accessControl->checkAccess($employee2, $manageUsers) ? 'True' : 'False') . "\n";
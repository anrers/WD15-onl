<?php

class Employee  {
    public function __construct(
        public $name,
        public $email,
        public $password,
        public $department,
        public $role
    ){}

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
    public function __construct(
        public $name,
    ){}

    public function getName() {
        return $this->name;
    }
}

class Permission {
    public function __construct(
        public $id,
        public $name,
    ){}

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

class Role {
    public $permissions = [];

    public function __construct(
        public $name,
    ){}

    public function getName() {
        return $this->name;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function addPermission($permission) {
        if (!in_array($permission, $this->permissions, true)) {
            $this->permissions[] = $permission;
        } 
    }

    public function removePermission($permission) {
        $index = array_search($permission, $this->permissions, true);

        if ($index !== false) {
            unset($this->permissions[$index]);
            $this->permissions = array_values($this->permissions);
        }
    }
}

class AccessControl {
    public function __construct(
        public $roles = [],
        public $permissions = [],
    ){}

    public function checkAccess($employee, $permission) {
        $role = $employee->getRole();

        foreach ($role->getPermissions() as $perm) {
            if ($perm->getName() === $permission->getName()) {
                return true;
            }
        }

        return false;
    }
}

$refundPermission = new Permission(1, 'Refund');
$newSalePermission = new Permission(2, 'New Sale');
$checkoutPermission = new Permission(3, 'Check Out');

$adminUser = new Role ('Admin');
$adminUser->addPermission($refundPermission);
$adminUser->addPermission($newSalePermission);
$adminUser->addPermission($checkoutPermission);

$subUser = new Role ('Sub-user');
$subUser->addPermission($checkoutPermission);

$hrDepartment = new Department ('HR');
$qaDepartment = new Department ('QA');
$devDepartment = new Department ('DEV');

$hrPerson = new Employee('Donuld Duck', 'test@example.com', 'qwerty12345', $hrDepartment, $subUser);
$qaPerson = new Employee('Billy Boom', 'test123@example.com', 'qwerty54321', $qaDepartment, $subUser);
$devPerson = new Employee('John Doe', 'test@example123.com', 'Qwerty12345', $devDepartment, $adminUser);

$roles = [$adminUser, $subUser];
#var_dump($roles);

$permissions = [$refundPermission, $newSalePermission, $checkoutPermission];
#var_dump($permissions);

$accessControl = new AccessControl($roles, $permissions);

#var_dump($hrPerson->getDepartment());
#var_dump($qaPerson->getName());

echo "Does {$hrPerson->getName()} from {$hrDepartment->getName()} department have permissions to perform Refund? " . ($accessControl->checkAccess($hrPerson, $refundPermission) ? 'Yes' : 'No') . "\n";
echo "Does {$hrPerson->getName()} from {$hrDepartment->getName()} department have permissions to perform New Sale? " . ($accessControl->checkAccess($hrPerson, $newSalePermission) ? 'Yes' : 'No') . "\n";
echo "Does {$hrPerson->getName()} from {$hrDepartment->getName()} department have permissions to perform Check Out? " . ($accessControl->checkAccess($hrPerson, $checkoutPermission) ? 'Yes' : 'No') . "\n";

echo "Does {$qaPerson->getName()} from {$qaDepartment->getName()} department have permissions to perform Refund? " . ($accessControl->checkAccess($qaPerson, $refundPermission) ? 'Yes' : 'No') . "\n";
echo "Does {$qaPerson->getName()} from {$qaDepartment->getName()} department have permissions to perform New Sale? " . ($accessControl->checkAccess($qaPerson, $newSalePermission) ? 'Yes' : 'No') . "\n";
echo "Does {$qaPerson->getName()} from {$qaDepartment->getName()} department have permissions to perform Check Out? " . ($accessControl->checkAccess($qaPerson, $checkoutPermission) ? 'Yes' : 'No') . "\n";

echo "Does {$devPerson->getName()} from {$devDepartment->getName()} department have permissions to perform Refund? " . ($accessControl->checkAccess($devPerson, $refundPermission) ? 'Yes' : 'No') . "\n";
echo "Does {$devPerson->getName()} from {$devDepartment->getName()} department have permissions to perform New Sale? " . ($accessControl->checkAccess($devPerson, $newSalePermission) ? 'Yes' : 'No') . "\n";
echo "Does {$devPerson->getName()} from {$devDepartment->getName()} department have permissions to perform Check Out? " . ($accessControl->checkAccess($devPerson, $checkoutPermission) ? 'Yes' : 'No') . "\n";


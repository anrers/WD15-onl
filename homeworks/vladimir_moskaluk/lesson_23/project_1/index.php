<?php

// Автозагрузка классов
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

// Создаем разрешения
$permView = new Permission("Просмотр продаж");
$permEdit = new Permission("Редактирование продаж");

// Создаем роли
$adminRole = new Role("Администратор");
$adminRole->addPermission($permView);
$adminRole->addPermission($permEdit);
$adminRole->removePermission($permEdit);

$userRole = new Role("Пользователь");
$userRole->addPermission($permView);

// Создаем отдел
$salesDepartment = new Department("Продаж");

// Создаем сотрудников
$admin = new Employee("Виктор Пупкин", "viktor@example.com", "password123", $salesDepartment, $adminRole);
$user = new Employee("Дмитрий Ветров", "dmitriy@example.com", "password321", $salesDepartment, $userRole);

// Управление доступом
$accessControl = new AccessControl();
$accessControl->addRole($adminRole);
$accessControl->addRole($userRole);
$accessControl->addPermission($permView);
$accessControl->addPermission($permEdit);

// Проверяем доступ
echo $accessControl->checkAccess($admin, $permEdit) ? "Доступ разрешен" : "Доступ запрещен"; // Доступ разрешен
echo "<br>";
echo $accessControl->checkAccess($user, $permEdit) ? "Доступ разрешен" : "Доступ запрещен"; // Доступ запрещен
echo "<br>";

// методы класса Employee
echo "Admin Name: " . $admin->getName() . "<br>";
echo "Admin Email: " . $admin->getEmail() . "<br>";
echo "Admin Department: " . $admin->getDepartment() . "<br>";
echo "Admin Role: " . $admin->getRole() . "<br>";
echo "Admin Password: " . $admin->getPassword() . "<br>";
echo "<br>";

echo "User Name: " . $user->getName() . "<br>";
echo "User Email: " . $user->getEmail() . "<br>";
echo "User Department: " . $user->getDepartment() . "<br>";
echo "User Role: " . $user->getRole() . "<br>";
echo "<br>";

// Получаем и выводим все роли
$roles = $accessControl->getRoles();
foreach ($roles as $role) {
    echo "Role: " . $role->getName() . "<br>";
}

// Получаем и выводим все разрешения
$permissions = $accessControl->getPermissions();
foreach ($permissions as $permission) {
    echo "Permission: " . $permission->getName() . "<br>";
}

// Проверяем, существуют ли определенные роли и разрешения
echo $accessControl->hasRole("Administrator") ? "Существует роль администратора.<br>" : "Роль администратора не существует.<br>";
echo $accessControl->hasPermission("edit_sales") ? "Есть разрешение на редактирование продаж.<br>" : ".Нет разрешения на редактирование продаж.<br>";

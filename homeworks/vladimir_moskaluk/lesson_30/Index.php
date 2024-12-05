<?php

declare(strict_types=1);

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/src/User.php';

use Config\Database;
use App\User;

$db = (new Database())->connect();
$user = new User($db);

// Создаем пользователя
$newUserId = $user->create('Alice', 'alice@example.com',  20);
echo "Создан пользователь с ID: $newUserId\n";

// Читаем пользователя
$readUser = $user->read($newUserId);
echo "Выбранный пользователь: " . json_encode($readUser) . "\n";

// Обновляем пользователя
$isUpdated = $user->update($newUserId, 'Alice Smith', 'alice.smith@example.com');
echo $isUpdated ? "Данные пользователя обновлены\n" : "Не удалось обноваить данные пользвоателя\n";

// Удаляем пользователя
$isDeleted = $user->delete($newUserId);
echo $isDeleted ? "Пользователь успешно удален\n" : "Не удалось удалить пользователя\n";

// Список всех пользователей
$users = $user->listAll();
echo "Все пользователи: " . json_encode($users) . "\n";

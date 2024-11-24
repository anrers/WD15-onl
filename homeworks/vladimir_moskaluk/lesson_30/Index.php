<?php

declare(strict_types=1);

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/src/User.php';
require_once __DIR__ . '/src/UserEntity.php';

use Config\Database;
use App\User;

$db = (new Database())->connect();
$userService = new User($db);

$newUser = $userService->create('Alice', 'alice@example.com', 20);
echo "Создан пользователь: " . json_encode($newUser) . "\n";

$readUser = $userService->read($newUser->id);
echo "Выбранный пользователь: " . json_encode($readUser) . "\n";

$isUpdated = $userService->update($newUser->id, 'Alice Smith', 'alice.smith@example.com');
echo $isUpdated ? "Данные пользователя обновлены\n" : "Не удалось обновить данные пользователя\n";

$isDeleted = $userService->delete($newUser->id);
echo $isDeleted ? "Пользователь успешно удален\n" : "Не удалось удалить пользователя\n";

$users = $userService->listAll();
echo "Все пользователи: " . json_encode($users) . "\n";

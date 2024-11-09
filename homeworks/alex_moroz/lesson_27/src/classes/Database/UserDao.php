<?php

namespace Database;

interface UserDao
{
    public function findUserById($userId);
    public function saveUser(string $name, int $age, string $email);
    public function updateUser(array $userData): bool;
    public function removeUser(string $userId): bool;
    public function findAllUsers();
}
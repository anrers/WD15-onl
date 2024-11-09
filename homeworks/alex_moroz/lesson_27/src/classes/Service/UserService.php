<?php

namespace Service;

interface UserService
{
    public function save(string $name, int $age, string $email);

    public function getUserById(string $userId);

    public function update(array $userData): bool;

    public function remove(string $userId): bool;

    public function getAllUsers();
}
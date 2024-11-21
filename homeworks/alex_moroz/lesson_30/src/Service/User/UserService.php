<?php

namespace Service\User;

use Model\User\User;

interface UserService
{
    public function save(string $name, int $age, string $email, int $gender): void;

    public function getUserByEmail(string $email): ?User;

    public function update(array $userData): void;

    public function remove(string $userId): void;

    public function getAllUsers(): ?array;
}
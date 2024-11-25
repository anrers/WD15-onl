<?php

namespace Repository\User;

use Model\User\User;

interface UserRepository
{
    public function findUserByEmail(string $email): ?User;
    public function saveUser(string $name, int $age, string $email, int $gender): void;
    public function updateUser(array $userData): void;
    public function removeUser(string $userId): void;
    public function findAllUsers(): ?array;
}
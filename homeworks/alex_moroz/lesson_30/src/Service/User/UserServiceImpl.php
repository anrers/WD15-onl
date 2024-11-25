<?php

namespace Service\User;

use ErrorException;
use Exception;
use Model\User\User;
use Repository\User\UserRepository;

class UserServiceImpl implements UserService
{
    public function __construct(
        private UserRepository $userRepository,
    ) {}

    public function save(string $name, int $age, string $email, int $gender): void {
        $this->userRepository->saveUser($name, $age, $email, $gender);
    }

    public function getUserByEmail(string $email): ?User
    {
        return $this->userRepository->findUserByEmail($email); //ошибки, будут проброшены выше
    }

    public function update(array $userData): void
    {
        $this->userRepository->updateUser($userData); //ошибки, будут проброшены выше
    }

    public function remove(string $userId): void
    {
        $this->userRepository->removeUser($userId); //ошибки, будут проброшены выше
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAllUsers(); //ошибки, будут проброшены выше
    }
}
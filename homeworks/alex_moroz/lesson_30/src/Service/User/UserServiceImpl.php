<?php

namespace Service\User;

use Exception as Exception;
use Model\User\User;
use Repository\User\UserRepository;

class UserServiceImpl implements UserService
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function save(string $name, int $age, string $email, int $gender): void
    {
        try {
            $this->userRepository->saveUser($name, $age, $email, $gender);
        } catch (Exception $exception) {
            echo $exception->getMessage();
            throw new Exception($exception->getMessage());
        }
    }

    public function getUserByEmail(string $email): ?User
    {
        try {
            return $this->userRepository->findUserByEmail($email);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function update(array $userData): void
    {
        try {
            $this->userRepository->updateUser($userData);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function remove(string $userId): void
    {
        try {
            $this->userRepository->removeUser($userId);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function getAllUsers(): array
    {
        try {
            return $this->userRepository->findAllUsers();
        } catch (Exception $exception) {
            echo $exception->getMessage();
            throw new Exception("Ошибка запроса: получение всех пользователей невозможно.");
        }
    }
}
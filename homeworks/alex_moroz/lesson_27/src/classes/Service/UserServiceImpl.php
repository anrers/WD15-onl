<?php

namespace Service;

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

use Database\UserDao;
use Users\User;

class UserServiceImpl implements UserService
{
    public function __construct(
        private UserDao $userDao,
    ) {
    }

    public function save(string $name, int $age, string $email)
    {
        $result = $this->userDao->saveUser($name, $age, $email);
        if (!empty($result)) {
            $user = new User($name, $age, $email);
            $user->setId($result);
            return $user;
        }

        return null;
    }

    public function getUserById(string $userId)
    {
        return $this->userDao->findUserById($userId)[0];
    }

    public function update(array $userData): bool
    {
        return $this->userDao->updateUser($userData);
    }

    public function remove(string $userId): bool
    {
        return $this->userDao->removeUser($userId);
    }

    public function getAllUsers()
    {
        return $this->userDao->findAllUsers();
    }
}
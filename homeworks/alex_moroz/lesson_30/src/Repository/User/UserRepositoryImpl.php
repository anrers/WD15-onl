<?php

namespace Repository\User;

use Exception;
use Model\User\User;
use PDOException;
use Repository\DatabaseConnection;

class UserRepositoryImpl implements UserRepository
{
    public function __construct()
    {
        $query = "
CREATE TABLE IF NOT EXISTS genders (
    id INT NOT NULL AUTO_INCREMENT , 
    name VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id),
    UNIQUE (name));
CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT , 
    name VARCHAR(50) NOT NULL , 
    email VARCHAR(50) NOT NULL , 
    age TINYINT NOT NULL ,
    gender_id INT NOT NULL ,
    PRIMARY KEY (id),
    UNIQUE (email),
    FOREIGN KEY (gender_id) REFERENCES genders(id) ON DELETE RESTRICT ON UPDATE RESTRICT);";
        $this->executeQuery($query);
    }

    public function findUserByEmail(string $email): ?User
    {
        $query = "SELECT id, name, age, email, gender_id AS genderId FROM users WHERE email = ?";
        try {
            return $this->executeQuery($query, array($email), 'READ')[0];
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            throw new Exception("Can't find User with email: {email=" . $email . "}.");
        }
    }

    public function saveUser(string $name, int $age, string $email, int $gender): void
    {
        $query = "INSERT INTO users (name, age, email, gender_id) VALUES (?, ?, ?, ?)";
        try {
            $this->executeQuery($query, array($name, $age, $email, $gender));
            echo "User was successfully saved.";
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            throw new Exception("Can't save User with email: {email=" . $email . "}");
        }
    }

    public function updateUser(array $userData): void
    {
        $query = "UPDATE users SET name = :name, email = :email, age = :age, gender_id = :gender WHERE id = :id";
        try {
            $this->executeQuery($query, $userData);
            echo "User with id = {" . $userData['id'] . "} was successfully updated.";
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            throw new Exception("Can't update User with id: {id=" . $userData['id'] . "}");
        }
    }

    public function removeUser(string $userId): void
    {
        $query = "DELETE FROM users WHERE id = ?";
        try {
            $this->executeQuery($query, array($userId));
            echo "User with id = {" . $userId . "} was successfully deleted.";
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            throw new Exception("Can't delete User with id: {id=" . $userId . "}");
        }
    }

    public function findAllUsers(): ?array
    {
        $query = "SELECT id, name, age, email, gender_id AS genderId FROM users";
        try {
            return $this->executeQuery($query, operationType: 'READ');
        } catch (PDOException $exception) {
            echo "Can't read Users: " . $exception->getMessage();
            throw new Exception("Can't read Users.");
        }
    }


    private function executeQuery(string $query, array $bindParams = null, string $operationType = null): ?array
    {
        try {
            $connection = DatabaseConnection::getConnection()->connect();
            if ($bindParams || $operationType) {
                $statement = $connection->prepare($query);
                $statement->execute($bindParams);
                if ($operationType) {
                    $result = [];
                    while ($user = $statement->fetchObject(User::class)) {
                        $result[] = $user;
                    }
                    return $result;
                }
                return null;
            }
            $connection->exec($query);
            return null;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            throw new PDOException($exception->getMessage());
        }
    }
}
<?php

namespace Database;

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

class UserDaoImpl implements UserDao
{
    public function __construct()
    {
        $query = 'CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT , 
    name VARCHAR(80) NOT NULL , 
    email VARCHAR(80) NOT NULL , 
    age TINYINT NOT NULL ,
    PRIMARY KEY (id))';
        $this->executeQuery($query, '');
    }

    public function findUserById($userId)
    {
        $query = sprintf("SELECT * FROM users WHERE id = %s", $userId);
        return $this->executeQuery($query, 'SEARCH');
    }

    public function saveUser(string $name, int $age, string $email)
    {
        $query = sprintf("INSERT INTO users (name, email, age) VALUES ('%s', '%s', %s)", $name, $email, $age);
        return $this->executeQuery($query, 'CREATE');
    }

    public function updateUser(array $userData): bool
    {
        $userId = $userData['id'];
        $changedFields = $userData['changedFields'];
        $query = sprintf("UPDATE users SET %s WHERE id = %s", $changedFields, $userId);
        return $this->executeQuery($query, 'UPDATE');
    }

    public function removeUser(string $userId): bool
    {
        $query = sprintf("DELETE from users WHERE id = %s", $userId);
        return $this->executeQuery($query, 'DELETE');
    }

    public function findAllUsers()
    {
        $query = "SELECT * FROM users";
        return $this->executeQuery($query, 'SEARCH');
    }


    private function executeQuery(string $query, string $operation)
    {
        $connection = DatabaseConnection::getConnection()->connect();

        switch ($operation) {
            case 'CREATE':
                $connection->query($query);
                $result = $connection->insert_id;
                break;
            case 'UPDATE':
            case 'DELETE':
                $result = $connection->query($query);
                break;
            case 'SEARCH':
                $result = $connection->query($query)->fetch_all(MYSQLI_ASSOC);
                break;
            default:
                $connection->query($query);
                break;
        }

        $connection->close();
        return $result;
    }
}
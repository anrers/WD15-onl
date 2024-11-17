<?php
$connection = new PDO("mysql:host=mysql-8.2;dbname=study",
    "root",
    "");

$connection->exec("CREATE TABLE IF NOT EXISTS users (
                            id int primary key AUTO_INCREMENT not null,
                            firstName varchar(30) not null,
                            lastName varchar(30) not null,
                            email varchar(30) not null)
                            ");

class Users
{
    private PDO|int $connection = 0;
    protected string $firstName;
    protected string $lastName;
    protected string $email;

    public function __construct(string $firstName, string $lastName, string $email, PDO|int $connection = 0)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->connection = $connection;
    }

    public function createUser(): int|bool
    {
        $query = $this->connection->prepare("SELECT email FROM users WHERE email=:email");
        $query->bindParam(":email", $this->email, PDO::PARAM_STR);
        $query->execute();
        $value = $query->fetch(PDO::FETCH_OBJ);

        if ($value == null) {
            $query = $this->connection->prepare("INSERT INTO users (firstName,lastName,email) VALUES (:firstName, :lastName, :email)");
            $query->bindParam(':firstName', $this->firstName, PDO::PARAM_STR);
            $query->bindParam(':lastName', $this->lastName, PDO::PARAM_STR);
            $query->bindParam(':email', $this->email, PDO::PARAM_STR);
            $query->execute();
            return $this->connection->lastInsertId();
        } else {
            return false;
        }
    }

    public function getUserById(int $id): Users|bool
    {
        $query = $this->connection->prepare("SELECT firstName,lastName,email FROM users WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $userData = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($userData) {
            $userData = new Users($userData[0]['firstName'], $userData[0]['lastName'], $userData[0]['email']);
            return $userData;
        }
        return false;
    }

    public function deleteUserById(int $id): void
    {
        $query = $this->connection->prepare("DELETE FROM users WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function updateUser(string $firstName, string $lastName, string $email, int $id): void
    {
        $query = $this->connection->prepare("UPDATE users SET firstName=:firstName,lastName=:lastName,email=:email WHERE id=" . $id);
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
    }
}



<?php
$connection = new PDO("mysql:host=mysql-8.2;dbname=study",
    "root",
    "");

$connection->query("CREATE TABLE IF NOT EXISTS users (
                            id  int primary key,
                            firstName varchar(30) not null,
                            lastName varchar(30) not null,
                            email varchar(30) not null)
                            ");

class Users
{
    private PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createUser(string $firstName, string $lastName, string $email, int $id): void
    {
        $connection = $this->connection;
        $query = $connection->prepare("INSERT INTO users (firstName,lastName,email,id) VALUES (:firstName, :lastName, :email, :id)");
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function updateUser(string $firstName, string $lastName, string $email, int $id): void
    {
        $connection = $this->connection;
        $query = $connection->prepare("UPDATE users SET lastName = :lastName, email = :email WHERE id = :id");
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function readUser(int $id): array
    {
        $connection = $this->connection;
        $result = $connection->prepare("SELECT * FROM users where id =:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteUser(int $id): void
    {
        $connection = $this->connection;
        $result = $connection->prepare("DELETE FROM users WHERE id = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }
}

<?php

class User 
{
    private $connection;
    private string $name;
    private string $email;

    public function __construct(PDO $connection) 
    {
        $this->connection = $connection;
    }

    public function create(string $name, string $email): bool|int 
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO users (name, email) VALUES (:name, :email)"
        );
        $stmt->execute([':name' => $name, ':email' => $email]);
        return $this->connection->lastInsertId();
    }

    public function read(int $id): ?User 
    {
        $stmt = $this->connection->prepare(
            "SELECT * FROM users WHERE id = ?"
        );
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            $user = new User($this->connection);
            $user->name = $data['name'];
            $user->email = $data['email'];
            return $user;
        }
        return null;
    }

    public function update(int $id, string $name, string $email): bool 
    {
        $stmt = $this->connection->prepare(
            "UPDATE users SET name = :name, email = :email WHERE id = :id"
        );
        return $stmt->execute([':id' => $id, ':name' => $name, ':email' => $email]);
    }

    public function delete(int $id): bool 
    {
        $stmt = $this->connection->prepare(
            "DELETE FROM users WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}

try {
    $connection = new PDO(
        "mysql:host=mysql-8.2;dbname=study;charset=utf8", 
        "root", 
        ""
    );
    $user = new User($connection);
} catch (PDOException $e) {
    echo $e->getMessage();
}
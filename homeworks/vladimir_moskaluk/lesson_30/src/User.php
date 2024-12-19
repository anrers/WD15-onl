<?php

declare(strict_types=1);

namespace App;

use PDO;

class User
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $name, string $email, int $age): UserEntity
    {
        $sql = "INSERT INTO users (name, email, age) VALUES (:name, :email, :age)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':age' => $age,
        ]);

        $id = (int)$this->pdo->lastInsertId();
        return new UserEntity($id, $name, $email, $age);
    }

    public function read(int $id): ?UserEntity
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? new UserEntity((int)$result['id'], $result['name'], $result['email'], (int)$result['age']) : null;
    }

    public function update(int $id, string $name, string $email): bool
    {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id, ':name' => $name, ':email' => $email]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

    public function listAll(): array
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);

        return array_map(
            fn($row) => new UserEntity((int)$row['id'], $row['name'], $row['email'], (int)$row['age']),
            $stmt->fetchAll(PDO::FETCH_ASSOC)
        );
    }
}

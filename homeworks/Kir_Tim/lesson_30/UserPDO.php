<?php

class User
{
    private $connection;
    private $name;
    private $email;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function createUser($name, $email): false|string
    {
        $preCreate = $this->connection->prepare(
            "INSERT INTO users (name, email) VALUES (:name, :email)"
        );
        $preCreate->execute([':name' => $name, ':email' => $email]);
        return $this->connection->lastInsertId(); //Получение последнего айдишника
    }

    public function read($id): ?User
    {
        $preRead = $this->connection->prepare(
            "SELECT * FROM users WHERE id = :id"
        );
        $preRead->execute([':id' => $id]);
        $userExists = $preRead->fetch(PDO::FETCH_ASSOC);

        if ($userExists) {
            $userInfo = new User($this->connection);
            $userInfo->name = $userExists['name'];
            $userInfo->email = $userExists['email'];
            return $userInfo;
        }
        return null;
    }

    public function update($id, $name, $email): bool
    {
        $updatePrepare = $this->connection->prepare(
            "UPDATE users SET name = :name, email = :email WHERE id = :id"
        );
        return $updatePrepare->execute([':id' => $id, ':name' => $name, ':email' => $email]);
    }

    public function delete($id): bool
    {
        $deletePrepare = $this->connection->prepare(
            "DELETE FROM users WHERE id = :id"
        );
        return $deletePrepare->execute([':id' => $id]);
    }
}

//Проверка
try {
    $connection = new PDO(
        "mysql:host=mysql-8.2;dbname=study;charset=utf8",
        "root",
        ""
    );
    $user = new User($connection);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}


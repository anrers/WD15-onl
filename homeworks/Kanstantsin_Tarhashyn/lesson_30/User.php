<?php

class User
{
    private $connection;
    private string $tableName = 'users';
    private string $name;
    private string $email;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(string $name, string $email)
    {
        $query = "INSERT INTO " .$this->tableName . " (name, email) VALUES (:name, :email)";
        $result = $this->connection->prepare($query);

        $result->bindParam(':name', $name);
        $result->bindParam(':email', $email);

        $result->execute();
        return $this->connection->lastInsertId();
    }
    public function read(int $id) {
        $query = "SELECT * FROM " . $this->tableName . " WHERE id = ?";
        $result = $this->connection->prepare($query);
        $result->execute([$id]);
        $data = $result->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new User($this->connection);
            $user->name = $data['name'];
            $user->email = $data['email'];
            return $user;
        }
        return null;
    }

    public function update($id, $name, $email) {
        $query = "UPDATE " . $this->tableName . " SET name = :name, email = :email WHERE id = :id";
        $result = $this->connection->prepare($query);

        $result->bindParam(':id', $id);
        $result->bindParam(':name', $name);
        $result->bindParam(':email', $email);

        if ($result->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE id = :id";
        $result = $this->connection->prepare($query);

        $result->bindParam(':id', $id);

        if ($result->execute()) {
            return true;
        }
        return false;
    }
}
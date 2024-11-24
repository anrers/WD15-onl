<?php

class User
{
    private $connection;
    private $tableName = 'users';

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create($name, $email)
    {
        $query = "INSERT INTO " .$this->tableName . " (name, email) VALUES (:name, :email)";
        $result = $this->connection->prepare($query);

        $result->bindParam(':name', $name);
        $result->bindParam(':email', $email);

        if ($result->execute()) {
            return true;
        }
        return false;
    }
    public function read() {
        $query = "SELECT * FROM " . $this->tableName;
        $result = $this->connection->prepare($query);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
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
<?php

namespace Database;

spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

class StudentDaoImpl implements StudentDao
{
    public function __construct()
    {
        $query = 'CREATE TABLE IF NOT EXISTS students (
    id INT NOT NULL AUTO_INCREMENT , 
    name VARCHAR(80) NOT NULL , 
    email VARCHAR(80) NOT NULL , 
    PRIMARY KEY (id))';
        $this->executeQuery($query, '');
    }

    public function saveStudent(string $name, string $email)
    {
        $query = sprintf("INSERT INTO students (name, email) VALUES ('%s', '%s')", $name, $email);
        return $this->executeQuery($query, 'CREATE');
    }

    public function findAllStudents()
    {
        $query = "SELECT * FROM students";
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
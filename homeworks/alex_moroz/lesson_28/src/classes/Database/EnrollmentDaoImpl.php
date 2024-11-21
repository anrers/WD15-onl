<?php

namespace Database;

class EnrollmentDaoImpl implements EnrollmentDao
{
    public function __construct()
    {
        $query = 'CREATE TABLE IF NOT EXISTS enrollments (
    id INT NOT NULL AUTO_INCREMENT , 
    student_id INT NOT NULL , 
    PRIMARY KEY (id))';
        $this->executeQuery($query);
    }

    public function fillEnrollments(array $studentIds): void
    {
        $query = "INSERT INTO enrollments (student_id) VALUES ('" . implode("'), ('", $studentIds) . "')";
        $this->executeQuery($query);
    }

    private function executeQuery(string $query): void
    {
        $connection = DatabaseConnection::getConnection()->connect();
        $connection->query($query);
        $connection->close();
    }
}
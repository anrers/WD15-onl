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
        $this->executeQuery($query, '');
    }

    public function fillEnrollments(string $student_ids)
    {
        $query = sprintf("INSERT INTO enrollments (student_id) VALUES %s", $student_ids);
        $this->executeQuery($query);
    }

    private function executeQuery(string $query)
    {
        $connection = DatabaseConnection::getConnection()->connect();
        $connection->query($query);
        $connection->close();
    }
}
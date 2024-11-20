<?php

namespace App;

use mysqli;

class StudentController
{
    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function addStudent(string $name, string $email): bool
    {
        $stmt = $this->db->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getAllStudents(): array
    {
        $result = $this->db->query("SELECT id, name, email FROM students");
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function enrollStudents(array $studentIds): bool
    {
        $stmt = $this->db->prepare("INSERT INTO enrollments (student_id) VALUES (?)");

        foreach ($studentIds as $studentId) {
            $stmt->bind_param("i", $studentId);
            $stmt->execute();
        }

        $stmt->close();
        return true;
    }
}

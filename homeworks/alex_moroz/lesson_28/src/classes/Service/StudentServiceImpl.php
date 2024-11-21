<?php

namespace Service;

use Database\StudentDao;
use Students\Student;

class StudentServiceImpl implements StudentService
{
    public function __construct(
        private StudentDao $studentDao,
    ) {
    }

    public function save(string $name, string $email): ?Student
    {
        $result = $this->studentDao->saveStudent($name, $email);
        if (!empty($result)) {
            $student = new Student($name, $email);
            $student->setId($result);
            return $student;
        }

        return null;
    }

    public function getAllStudents(): array
    {
        return $this->studentDao->findAllStudents();
    }

    public function getEnrolledStudents(): array
    {
        return $this->studentDao->findEnrolledStudents();
    }

    public function getNotEnrolledStudents(): array
    {
        return $this->studentDao->findNotEnrolledStudents();
    }
}
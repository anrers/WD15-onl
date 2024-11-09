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

    public function save(string $name, string $email)
    {
        $result = $this->studentDao->saveStudent($name, $email);
        if (!empty($result)) {
            $student = new Student($name, $email);
            $student->setId($result);
            return $student;
        }

        return null;
    }

    public function getAllStudents()
    {
        return $this->studentDao->findAllStudents();
    }
}
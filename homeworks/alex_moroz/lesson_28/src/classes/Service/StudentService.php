<?php

namespace Service;

use Students\Student;

interface StudentService
{
    public function save(string $name, string $email): ?Student;
    public function getAllStudents(): array;
    public function getNotEnrolledStudents(): array;
    public function getEnrolledStudents(): array;
}
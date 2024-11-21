<?php

namespace Database;

interface StudentDao
{
    public function saveStudent(string $name, string $email): array;
    public function findAllStudents(): array;
    public function findNotEnrolledStudents(): array;
    public function findEnrolledStudents(): array;
}
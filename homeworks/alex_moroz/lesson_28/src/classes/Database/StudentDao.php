<?php

namespace Database;

interface StudentDao
{
    public function saveStudent(string $name, string $email);
    public function findAllStudents();
    public function findNotEnrolledStudents();
    public function findEnrolledStudents();
}
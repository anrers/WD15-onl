<?php

namespace Service;

interface StudentService
{
    public function save(string $name, string $email);

    public function getAllStudents();
    public function getNotEnrolledStudents();
    public function getEnrolledStudents();
}
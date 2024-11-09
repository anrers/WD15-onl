<?php

namespace Service;

interface StudentService
{
    public function save(string $name, string $email);

    public function getAllStudents();
}
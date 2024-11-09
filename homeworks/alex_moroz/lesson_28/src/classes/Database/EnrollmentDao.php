<?php

namespace Database;

interface EnrollmentDao
{
    public function fillEnrollments(string $student_ids);
}
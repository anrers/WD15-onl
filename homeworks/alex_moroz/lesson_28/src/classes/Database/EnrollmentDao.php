<?php

namespace Database;

interface EnrollmentDao
{
    public function fillEnrollments(array $studentIds);
}
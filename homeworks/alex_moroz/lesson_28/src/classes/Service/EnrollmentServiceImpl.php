<?php

namespace Service;

use Database\EnrollmentDao;

class EnrollmentServiceImpl implements EnrollmentService
{
    public function __construct(
        private EnrollmentDao $enrollmentDao
    ) {
    }

    public function fillEnrollments(string $student_ids)
    {
        return $this->enrollmentDao->fillEnrollments($student_ids);
    }

}
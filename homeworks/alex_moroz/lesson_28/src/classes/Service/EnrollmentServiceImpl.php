<?php

namespace Service;

use Database\EnrollmentDao;

class EnrollmentServiceImpl implements EnrollmentService
{
    public function __construct(
        private EnrollmentDao $enrollmentDao
    ) {
    }

    public function fillEnrollments(array $studentIds): void
    {
        $this->enrollmentDao->fillEnrollments($studentIds);
    }

}
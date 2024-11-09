<?php
spl_autoload_register(function ($class_name) {
    require_once 'src/classes/' . $class_name . '.php';
});

use Database\StudentDaoImpl as StudentDao;
use Service\StudentServiceImpl as StudentService;
use Database\EnrollmentDaoImpl as EnrollmentDao;
use Service\EnrollmentServiceImpl as EnrollmentService;

$studentDao = new StudentDao();
$studentService = new StudentService($studentDao);

$enrollmentDao = new EnrollmentDao();
$enrollmentService = new EnrollmentService($enrollmentDao);
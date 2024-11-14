<?php
require_once '../bootstrap.php';

if ($_POST['studentsIds']) {
    print_r(json_decode($_POST['studentsIds']));
    $enrollmentService->fillEnrollments(json_decode($_POST['studentsIds']));
    header('location: ../index.php');
}

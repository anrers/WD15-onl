<?php
require_once '../bootstrap.php';
/**
 * @var $enrollmentService {@link \Service\EnrollmentService}
 */
if ($_POST['studentsIds']) {
    $enrollmentService->fillEnrollments(json_decode($_POST['studentsIds']));
    header('location: ../index.php');
}

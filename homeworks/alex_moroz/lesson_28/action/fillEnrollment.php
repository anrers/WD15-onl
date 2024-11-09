<?php
require_once '../bootstrap.php';

if ($_POST['studentsIds']) {
    $enrollmentService->fillEnrollments($_POST['studentsIds']);
    header('location: ../index.php');
}

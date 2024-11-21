<?php
require_once '../bootstrap.php';
require_once 'validateStudentData.php';
/**
 * @var $studentService {@link \Service\StudentService}
 */

$errors = validateStudentData();
if (empty($errors)) {
    $result = $studentService->save($_POST["name"], $_POST["email"]);
    header("Location: ../index.php");
    return;
}

foreach ($errors as $error) {
    echo "<p style='color: red;'>$error</p>";
}
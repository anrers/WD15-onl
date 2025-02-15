<?php
require_once 'db_students.php';

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS enrollments (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        STUDENTS_ID INT
    )
");

//$students = $connection->query("
//    SELECT students.ID FROM students, enrollments WHERE enrollments.STUDENTS_ID <> students.ID; // В таблице должна быть хотя бы одна запись со STUDENTS_ID
//    ");
$students = $connection->query("
   SELECT students.ID FROM students NATURAL LEFT JOIN enrollments WHERE enrollments.STUDENTS_ID IS NULL
");

//foreach ($students as $student => $ID) {
//    foreach ($ID as $stId) {
//        $connection->query("
//INSERT INTO enrollments (STUDENTS_ID) VALUE ('$stId')
//   ");
//    }
//}
$values = [];
foreach ($students as $student) {
    $values[] = "('$student')";
}
$valuesStr = implode(',', $values);
$connection->query("
INSERT INTO enrollments (STUDENTS_ID) VALUES ('$valuesStr')
");

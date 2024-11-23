<?php

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study",
);

$result = $connection->query("SELECT id, name FROM students");

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

$connection->query("
    CREATE TABLE IF NOT EXISTS enrollments (
        id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT NOT NULL,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['studentIds'])) { 
    $studentIds = $_POST['studentIds'];

    $result = $connection->prepare("INSERT INTO enrollments (student_id) VALUES(?)");

    foreach ($studentIds as $studentId) {
        if (studentExists($studentId)) {
            echo "Student with this id was already enrolled!";
        } else {
            $result->bind_param("i", $studentId);
            $result->execute();

            echo "Selected students have been enrolled!";
        }
    }

    $result->close();
} else {
    echo "No students selected for enrollment.";
}

function studentExists (int $studentId)
{
    global $connection;

    $query = $connection->prepare("SELECT COUNT(*) FROM enrollments WHERE student_id = ?");
    $query->bind_param("i", $studentId);
    $query->execute();

    $query->bind_result($count);
    $query->fetch();
    $query->close();
    
    return $count > 0;
}

$connection->close();

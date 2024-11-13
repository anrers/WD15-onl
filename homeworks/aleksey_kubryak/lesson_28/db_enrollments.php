<?php

require_once 'db_students.php';

$connection = new mysqli(
    "mysql-8.2",
    "root",
    "",
    "study",
);

$connection->query("
    CREATE TABLE IF NOT EXISTS enrollments (
        id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
    )
");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $connection->query("SELECT id FROM students");
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studentId = $row['id'];
            $stmt = $connection->prepare("INSERT INTO enrollments (student_id) VALUES (?)");
            $stmt->bind_param('i', $studentId);

            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
        }
        echo "All students have been enrolled successfully";
    } else {
        echo "No students found to enroll";
    }
}

$connection->close();
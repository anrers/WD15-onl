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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_ids'])) { 
    $student_ids = $_POST['student_ids'];
    print_r($_POST);

    $result = $connection->prepare("INSERT INTO enrollments (student_id) VALUES(?)");

    foreach ($student_ids as $student_id) {
        $result->bind_param("i", $student_id);
        $result->execute();
    }

    $result->close();
    echo "Selected students have been enrolled!";
} else {
    echo "No students selected for enrollment.";
}

$connection->close();
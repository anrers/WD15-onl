<?php

$connection = new mysqli("mysql-8.2", "root", "", "study");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$connection->query("
    CREATE TABLE IF NOT EXISTS enrollments (
        id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT NOT NULL,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
    )
");

$result = $connection->query("
    SELECT s.id, s.name 
    FROM students s
    LEFT JOIN enrollments e ON s.id = e.student_id
    WHERE e.student_id IS NULL
");

$students = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_ids'])) { 
    $studentIds = $_POST['student_ids'];

    $stmt = $connection->prepare("INSERT INTO enrollments (student_id) VALUES(?)");

    foreach ($studentIds as $studentId) {
        if (isEnrolled((int) $studentId)) {
            echo "Student with ID $studentId is already enrolled!<br>";
        } else {
            $stmt->bind_param("i", $studentId);
            $stmt->execute();
        }
    }

    $stmt->close();
    echo "Selected students have been enrolled!";
}

function isEnrolled(int $studentId): bool {
    global $connection;

    $stmt = $connection->prepare("SELECT COUNT(*) FROM enrollments WHERE student_id = ?");
    $stmt->bind_param("i", $studentId);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}

$connection->close();
?>
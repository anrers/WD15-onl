<?php
session_start();
if (!empty($_POST['name']) and !empty($_POST['email'])) {
    $conn = new mysqli("MySql-8.2", "root", "", "study");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $studentName = $_POST['name'];
    $studentEmail = $_POST['email'];
    $sql = "INSERT INTO students (name, email) VALUES ('$studentName', '$studentEmail')";
    if ($conn->query($sql)) {
        $_SESSION['status'] = 1;
    } else {
        $_SESSION['status'] = 0;
    }

    $conn->close();

    header("Location: index.php");
} else {
    $_SESSION['status'] = 0;
    header("Location: index.php");
}
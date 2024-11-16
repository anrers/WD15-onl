<?php
$conn = new mysqli("MySql-5.7", "root", "", "study");
if ($conn->connect_error){
    die ("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM students";
$result = $conn->query($sql);

$studentIdAll = [];
foreach ($result as $row) {
    $studentIdAll[] = $row['id'];
}

$sqiSelectEnrollments = "SELECT student_id FROM enrollments";
$result2 = $conn->query($sqiSelectEnrollments);

$addedStudents = [];
foreach ($result2 as $row) {
    $addedStudents[] = $row['student_id'];
}

$notAddedStudents = array_diff($studentIdAll, $addedStudents);

$h1 = "Студентов не занесенных в таблицу enrollments не найдено";
if (count($notAddedStudents) > 1) {
    $h1 = "Эти студенты не занесены в таблицу enrollments";
}

if (count($notAddedStudents) == 1) {
    $h1 = "Этот студент не занесен в таблицу enrollments";
}

//var_dump($notAddedStudents);
echo "<h1>$h1</h1>";
echo "<table><tr><th>Id</th><th>Имя</th></tr>";
foreach ($result as $row) {
    if (in_array($row['id'], $notAddedStudents)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "</tr>";
    }
}
echo "</table>"; ?>

<form action="" method="post">
    <input name="addStudents" type="submit" value="Добавить">
</form>

<?php

if (isset($_POST['addStudents'])) {
    foreach ($result as $row) {
        if (in_array($row['id'], $notAddedStudents)) {
            $studId = $row['id'];
            $result3 = $conn->query("INSERT INTO enrollments (student_id) VALUES ('$studId')");
        }
    }
}

$conn->close();

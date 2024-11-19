<?php
$conn = new mysqli("MySql-5.7", "root", "", "study");
if ($conn->connect_error){
    die ("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT students.id, students.name, students.email FROM students LEFT JOIN enrollments ON students.id = enrollments.student_id WHERE enrollments.student_id IS NULL";
$result = $conn->query($sql);

$count = count($result->fetch_all());

$h1 = "Студентов не занесенных в таблицу enrollments не найдено";
if ($count > 1) {
    $h1 = "Эти студенты не занесены в таблицу enrollments";
}

if ($count  == 1) {
    $h1 = "Этот студент не занесен в таблицу enrollments";
}

echo "<h1>$h1</h1>";
echo "<table><tr><th>Id</th><th>Имя</th></tr>";
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "</tr>";
}
echo "</table>"; ?>

    <form action="" method="post">
        <input name="addStudents" type="submit" value="Добавить">
    </form>

<?php

if (isset($_POST['addStudents'])) {
    foreach ($result as $row) {
        $studId = $row['id'];
        $result3 = $conn->query("INSERT INTO enrollments (student_id) VALUES ('$studId')");
    }
}

$conn->close();

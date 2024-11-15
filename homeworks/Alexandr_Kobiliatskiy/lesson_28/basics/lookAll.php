<?php
 $conn = new mysqli("MySql-8.2", "root", "", "study");
 if ($conn->connect_error){
     die ("Ошибка: " . $conn->connect_error);
 }

 $sql = "SELECT * FROM students";
 $sqiSelectEnrollments = "SELECT student_id FROM enrollments";

 $studentIdAll = [];
 $result2 = $conn->query($sqiSelectEnrollments);

foreach ($result2 as $row) {
    $studentIdAll[] = $row['student_id'];
}

 if ($result = $conn->query($sql)) {
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Email</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
        $studId = $row["id"];
        if (!in_array($row["id"], $studentIdAll)) {
            $result3 = $conn->query("INSERT INTO enrollments (student_id) VALUES ('$studId')");
        }
    }
    echo "</table>";

} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();

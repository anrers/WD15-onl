<?php
 $conn = new mysqli("MySql-5.7", "root", "", "study");
 if ($conn->connect_error){
     die ("Ошибка: " . $conn->connect_error);
 }

 $sql = "SELECT * FROM students";

 if ($result = $conn->query($sql)) {
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>В базе найдено: $rowsCount студентов</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Email</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();

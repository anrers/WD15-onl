<?php
 $conn = new mysqli("MySql-5.7", "root", "", "study");
 if ($conn->connect_error){
     die ("Ошибка: " . $conn->connect_error);
 }

 $sql = "SELECT students.name, SUM(price) AS Count FROM students LEFT JOIN favorites ON students.id = favorites.user_id
 LEFT JOIN products ON products.id = favorites.products_id GROUP BY students.name ORDER BY Count DESC";

 if ($result = $conn->query($sql)) {

    foreach ($result as $row){?>
        <div>
            <p><?=$row['name'] . ' - ' . $row['Count']; ?></p>
        </div>
<?php
    }
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>

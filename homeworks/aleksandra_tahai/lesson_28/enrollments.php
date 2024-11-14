<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study");

$connection->query("CREATE TABLE if not exists enrollments(
        id INT PRIMARY KEY auto_increment,
        student_id INT UNIQUE not null,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
)");

$result = $connection->query("SELECT students.id, students.name, students.email FROM students left join enrollments on students.id = enrollments.student_id where enrollments.student_id IS NULL")->fetch_all(MYSQLI_ASSOC);

if (isset($_POST["chosenStudent"])) {
    global $connection;
    $chosenStudent = $_POST["chosenStudent"];
    print_r($chosenStudent);
    foreach ($chosenStudent as $studentId) {
        $connection->query("INSERT INTO enrollments (student_id) VALUES ('$studentId') ");
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css">
    <title>Enrollments</title>
</head>
<body>
<form id="addStrudentToList" method="post">
    <?php
    foreach ($result as $row) {
        echo "<label for=" . $row['id'] . "><input type='checkbox' name='chosenStudent[]' value=" . $row['id'] . " class=" . $row['id'] . ">Student's name: " . $row['name'] . ", email: " . $row['email'] . "</label>";
    }
    ?>
    <input type="submit">
</form>
</body>
</html>

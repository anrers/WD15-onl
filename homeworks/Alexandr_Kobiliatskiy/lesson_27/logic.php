<?php
session_start();

$сondition1 = (!empty($_POST['userName']) and !empty($_POST['userAge']) and !empty($_POST['userEmail']));
$сondition2 = (preg_match("/^[a-zA-Z ]*$/", $_POST['userName']) == 1 and preg_match("/^[0-9]*$/", $_POST['userAge']) == 1);

if ($сondition1 and $сondition2) {
        $_SESSION['result'] = 1;

        $connection = new mysqli (
            hostname: 'mysql-8.2',
            username: 'root',
            password: '',
            database: 'study'
        );
        $userName = $_POST['userName'];
        $userAge = (int)$_POST['userAge'];
        $userEmail = $_POST['userEmail'];

        $sql = "INSERT INTO users (name, age, email) VALUE ('$userName', $userAge, '$userEmail')";
        $result = $connection->query($sql);

        $connection->close();

} else {
    $_SESSION['result'] = 0;
}

header("location: https://homework-lesson-27/index.php");

<?php
session_start();
if (!empty($_POST['userName']) and !empty($_POST['userAge']) and !empty($_POST['userEmail'])) {
    if (preg_match("/^[a-zA-Z ]*$/", $_POST['userName']) == 1 and preg_match("/^[0-9]*$/", $_POST['userAge']) == 1) {

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


        //Часть задания которая после добавления пользователя из формы
        $selectUser = "SELECT name FROM users WHERE id=9";
        $resultSelectUser = $connection->query($selectUser);
        
        $changeUsedata = "UPDATE users SET name='Semen', age=20, email='semen@mail.ru' WHERE id=10";
        $resultchangeUsedata = $connection->query($changeUsedata);

        $deleteUser = "DELETE FROM users WHERE id=11";
        $resultDeleteUser = $connection->query($deleteUser);

        $connection->close();

       } else  {
        $_SESSION['result'] = 0;
        header("location: https://homework-27/index.php");
        die;
       } 
} else {
    $_SESSION['result'] = 0;
    header("location: https://homework-27/index.php");
}
?>
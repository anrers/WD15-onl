<?php
session_start();
if (!empty($_POST['exampleInputName']) and !empty($_POST['exampleInputSurname']) and !empty($_POST['exampleInputEmail']) and !empty($_POST['exampleCheck'])) {
    if (preg_match("/^[a-zA-Z ]*$/", $_POST['exampleInputName']) == 1 and preg_match("/^[a-zA-Z ]*$/", $_POST['exampleInputSurname']) == 1) {
        $_SESSION['result'] = 1;
    } else {
        $_SESSION['result'] = 0;
    }
    header("location: https://homework-lesson-20/index_20.php");
    die;
} else {
    $_SESSION['result'] = 0;
    header("location: https://homework-lesson-20/index_20.php");
}

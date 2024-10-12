<?php
if (!empty($_POST['exampleInputName']) and !empty($_POST['exampleInputSurname']) and !empty($_POST['exampleInputEmail']) and !empty($_POST['exampleCheck'])) {

    header("location: https://homework-lesson-20/index_20.php?success=1");
    die;
} else {

    header("location: https://homework-lesson-20/index_20.php?success=0");
}
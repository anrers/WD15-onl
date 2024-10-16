<?php

# 1. Создайте файл example.txt и запишите в него текст "Hello, world!" с
#помощью функции fwrite(). Затем откройте этот файл и выведите его
#содержимое на экран с помощью функции fgets()

$newText = "hello, world!";
$newFile = fopen("example.txt", "r+");
fwrite($newFile, $newText);
fclose($newFile);

$newFile = fopen("example.txt", "r");
$newFileText = fread($newFile, filesize("example.txt"));
fclose($newFile);
echo $newFileText;
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework #21</title>
</head>
<body>
<form action="" method="post">
    <label for="formName">Name:</label>
    <input id="formName" name="formName" type="text" pattern="^[a-zA-Z]{3,15}$" title="Write your name correctly"
           required>
    <label for="formSurname">Surname:</label>
    <input id="formSurname" name="formSurname" type="text" pattern="^[a-zA-Z]{3,15}$"
           title="Write your surname correctly" required>
    <label for="formEmail">Email:</label>
    <input id="formEmail" name="formEmail" type="text" pattern="^[\w\.]+@[a-z]{5,8}.[a-z]{3}$"
           title="Write your email correctly" required>
    <button type="submit">Send a form</button>

    <?php

    //Напишите скрипт PHP, который будет открывать файл data.txt в
    //режиме записи и записывать в него данные, которые были введены
    //пользователем в форму на веб-странице. Данные должны быть
    //разделены запятыми. Форма должна содержать поля "Имя",
    //"Фамилия" и "Email". После записи данных в файл, выведите
    //сообщение об успешной записи данных.


    $formName = $_POST["formName"] ?? null;
    $formSurname = $_POST["formSurname"] ?? null;
    $formEmail = $_POST["formEmail"] ?? null;

    if (!empty($formName) && !empty($formSurname) && !empty($formEmail)) {
        if (preg_match("#^[a-zA-Z]{3,15}$#", $formName) && preg_match("#^[a-zA-Z]{3,15}$#", $formSurname) && preg_match("#^[\w/.]+@[a-z]{5,8}.[a-z]{3}$#", $formEmail)) {
            $formResult = "Form is successfully submitted!";
            echo "<p>$formResult</p>";

            $arrayForm = [$formName, $formSurname, $formEmail];
            $dataForm = file_put_contents("data.txt", implode(",", $arrayForm));

        } else {
            $formResult = "Form is not submitted!";
            echo "<p>$formResult</p>";
        }
    }

    ?>
</form>
</body>
</html

<?php
// Напишите скрипт PHP, который будет открывать файл example.txt в
//режиме записи и записывать в него случайные числа от 1 до 1000,
//разделенные пробелами. Запишите в файл 10 случайных чисел.
//После записи чисел закройте файл. Затем откройте этот файл
//снова в режиме чтения и выведите на экран сумму всех чисел,
//которые были записаны в файл.

$openFile = fopen("example.txt", "r+");
for ($i = 0; $i < 10; $i++) {
    $randomNumber = rand(1, 1000);
    fwrite($openFile, " ".$randomNumber);
}
fclose($openFile);

$openFile = fopen("example.txt", "a+");
$array = fread($openFile, filesize("example.txt"));
fclose($openFile);
$array = explode(" ", $array);
$sumOfArray = array_sum($array);
?>





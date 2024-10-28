<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $file = fopen("data.txt", "a+");
    $newData = $firstName . "," . $lastName . "," . $email . PHP_EOL;
    fwrite($file, $newData);
    fclose($file);

    echo "Данные успешно записаны";
}
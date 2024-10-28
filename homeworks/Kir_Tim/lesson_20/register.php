<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $agree = isset($_POST['formApproval']);

    $errors = [];

    if (empty($firstName) || strlen($firstName) < 2) {
        $errors[] = "Поле 'имя' не заполнено или имеет менее двух символов";
    }

    if (empty($lastName) || strlen($lastName) < 2) {
        $errors[] = "Поле 'Фамилия' не заполнено или имеет менее двух символов";
    }

    if (!$email) {
        $errors[] = "Почтовый адрес введен некорректно";
    }

    if (!$agree) {
        $errors[] = "Не получено согласие на обработку данных";
    }


    if (empty($errors)) {
        echo "<h3>Регистрация прошла успешно</h3>";
        echo "Имя: " . htmlspecialchars($firstName) . "<br>";
        echo "Фамилия: " . htmlspecialchars($lastName) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
    } else {
        echo "<h3>Регистрация не пройдена</h3>";
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
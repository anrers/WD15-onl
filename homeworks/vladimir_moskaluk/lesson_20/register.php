<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8');
    $last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $agree = isset($_POST['agree']);

     $errors = [];

    if (empty($first_name) || strlen($first_name) < 2) {
        $errors[] = "Поле 'имя' не заполнено или имеет менее двух символов";
    }

    if (empty($last_name) || strlen($last_name) < 2) {
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
        echo "Имя: " . htmlspecialchars($first_name) . "<br>";
        echo "Фамилия: " . htmlspecialchars($last_name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
    } else {
        echo "<h3>Регистрация не пройдена</h3>";
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    echo "<p>Запрос поступил не методом POST.</p>";
}

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Открываем файл data в режиме добавления ("a")
    $file = fopen("data.txt", "a");

    // Записываем данные в файл, разделяя их запятыми
    $line = $first_name . "," . $last_name . "," . $email . PHP_EOL;
    fwrite($file, $line);

    // Закрываем файл после записи
    fclose($file);

    // Выводим сообщение об успешной записи
    echo "Данные успешно записаны в файл.";
} else {
    echo "Неверный метод запроса.";
}



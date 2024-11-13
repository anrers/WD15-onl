<?php

declare(strict_types=1); // директива, которая включает строгую типизацию

$connection = new mysqli(
    hostname: "mysql-8.2",
    username: "root",
    password: "",
    database: "study"
);

//проверка на ошибку подключения
if ($connection->connect_error) {
    throw new RuntimeException("Connection failed: " . $connection->connect_error);
}

// Создаем таблицу users, если она еще не существует
$connection->query(
    "CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        age INT NOT NULL,
        email VARCHAR(100) NOT NULL
    )"
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
    $email = $_POST['email'] ?? '';

    saveData($connection, $name, $age, $email);
}

//Докблоки — для каждой функции добавлены PHPDoc комментарии, описывающие назначение, параметры и возвращаемые значения. (для лучшей читаемости кода и поддержки)
//@param - это тег, с анг. параметр. Используется для описания типа и назначения параметра. @param входит в спецификацию PSR-5.
// Пример - @param string $name, т.е. тип данных "string" имя "$name".
/**
 * Сохраняет данные пользователя в таблице users.
 *
 * @param mysqli $connection
 * @param string $name
 * @param int $age
 * @param string $email
 */
function saveData(mysqli $connection, string $name, int $age, string $email): void
{
    $stmt = $connection->prepare("INSERT INTO users (name, age, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $email); //связываем параметры с типами данных. "s" — строка, "i" — целое число.
    $stmt->execute(); //выполняем запрос.
    $stmt->close();
}

/**
 * Получает данные пользователя по ID.
 *
 * @param mysqli $connection
 * @param int $id
 * @return array|null
 */
function getUserById(mysqli $connection, int $id): ?array
{
    $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); //Извлекаем ассоциативный массив с данными пользователя.
    $stmt->close(); // Закрываем подготовленное выражение и возвращаем данные пользователя.

    return $user ?: null; //Если данных нет, возвращаем null.
}

/**
 * Обновляет данные пользователя по ID.
 *
 * @param mysqli $connection
 * @param int $id
 * @param string $name
 * @param int $age
 * @param string $email
 */
function updateUser(mysqli $connection, int $id, string $name, int $age, string $email): void
{
    $stmt = $connection->prepare("UPDATE users SET name = ?, age = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sisi", $name, $age, $email, $id);
    $stmt->execute();
    $stmt->close();
}

/**
 * Удаляет пользователя по ID.
 *
 * @param mysqli $connection
 * @param int $id
 */
function deleteUserById(mysqli $connection, int $id): void
{
    $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Закрытие соединения
$connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework 27</title>
</head>
<body>
<form method="post">
    <label for="name">Enter your name:</label>
    <input type="text" id="name" name="name" required>

    <label for="age">Enter your age:</label>
    <input type="number" id="age" name="age" required>

    <label for="email">Enter your email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Submit">
</form>
</body>
</html>

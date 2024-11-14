<?php
$connection = new mysqli(
    'mysql-8.2',
    "root",
    "",
    "study");


$query = "CREATE TABLE if not exists formUsers(
        id INT PRIMARY KEY auto_increment,
        name VARCHAR(50) not null,
        age INT not null,
        email VARCHAR(50) not null 
)";

$result = $connection->query($query);


if ($_POST) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if (preg_match('#^[a-zA-Z]{1,15}$#', $name) and preg_match(
            '#^(1[89]|[2-9][0-9])$#', $age) and preg_match('#^(\w+)@[a-z]{3,5}.[a-z]{2,3}$#', $email)) {
        $addInfo = $connection->query("INSERT INTO formUsers (name, age, email) VALUES ('$name', '$age', '$email')");
    }
}


function getUserById(int $id)
{
    global $connection;
    $query = $connection->prepare("SELECT * FROM formUsers WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 0) {
        return null;
    } else {
        return $result->fetch_all(SQLITE_ASSOC);
    }
}

function updateUser($id, $name, $age, $email)
{
    global $connection;

    $result = $connection->prepare("UPDATE formUsers SET name = ?, age = ?, email = ? WHERE id = ?");
    $result->bind_param("sisi", $name, $age, $email, $id);
    $result->execute();
}

function deleteUserById(int $id)
{
    global $connection;
    $query = $connection->prepare("DELETE FROM formUsers WHERE id = ?");
    $query->bind_param('i', $id);
    $query->execute();
}

function closeConnection()
{
    global $connection;
    $connection->close();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework 27</title>
</head>
<body>

<div>
    <form method="post" action="">
        <label> Write your name:
            <input type="text" name="name" pattern="^[a-zA-Z]{1,15}$" required>
        </label>

        <label> Write your age:
            <input type="text" name="age" pattern="^(1[89]|[2-9][0-9])$"
                   required>
        </label>

        <label> Write your email:
            <input type="email" name="email" pattern="^(\w+)@[a-z]{3,5}.[a-z]{2,3}$" required>
        </label>

        <input type="submit">
    </form>
</div>
</body>
</html>

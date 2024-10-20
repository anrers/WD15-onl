<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data form</title>
</head>
<body>
<form action="secondData.php" method="post">
    <input type="text" name="firstName" placeholder="Имя" title="Ваше Имя" required><br>
    <input type="text" name="lastName" placeholder="Фамилия" title="Ваша Фамилия" required><br>
    <input type="email" name="email" placeholder="Email" title="Ваш Email адрес" required><br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>

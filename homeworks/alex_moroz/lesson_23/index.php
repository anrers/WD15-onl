<?php
?>

<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW 23</title>
</head>
<body>
<form action="handler.php" method="post">
    <select name="vehicle">
        <option selected hidden>Выберите тип ТС</option>
        <option>Bus</option>
        <option>Car</option>
        <option>Motorcycle</option>
        <option>Bicycle</option>
    </select>
    <button type="submit" name="submit" value="submit">Отправить</button>
</form>
</body>
</html>

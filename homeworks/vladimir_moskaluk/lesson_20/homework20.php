<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<h2>Регистрация</h2>

<form action="/register.php" method="post">
    <div>
        <label for="first-name">Имя:</label>
        <input type="text" id="first-name" name="first_name" required
               minlength="2" maxlength="20" pattern="[A-Za-z\s]+"
               title="Введите своё имя">
    </div>
    <div>
        <label for="last-name">Фамилия:</label>
        <input type="text" id="last-name" name="last_name" required
               minlength="2" maxlength="20" pattern="[A-Za-z\s]+"
               title="Введите свою Фамилию">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required
               maxlength="30" placeholder="example@example.com">
    </div>
    <div>
        <input type="checkbox" id="agree" name="agree" required>
        <label for="agree">Я согласен на обработку моих данных</label>
    </div>
    <div>
        <button type="submit">Регистрация</button>
    </div>
</form>
</body>
</html>
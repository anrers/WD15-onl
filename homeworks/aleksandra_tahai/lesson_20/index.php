<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOMEWORK 20</title>
</head>
<body>
<form action="register.php" method="post">
    <label for="formName">Name:</label>
    <input id="formName" name="formName" type="text" pattern="^[a-zA-Z]{3,15}$" title="Write your name correctly"
           required>

    <label for="formSurname">Surname:</label>
    <input id="formSurname" name="formSurname" type="text" pattern="^[a-zA-Z]{3,15}$"
           title="Write your surname correctly" required>

    <label for="formEmail">Email:</label>
    <input id="formEmail" name="formEmail" type="text" pattern="^[\w\.]+@[a-z]{5,8}.[a-z]{3}$"
           title="Write your email correctly" required>

    <label>Consent for Data Processing </label>
    <input type="checkbox" name="formAgreement" type="email" required>

    <button type="submit">Send a form</button>
</form>
</body>
</html>
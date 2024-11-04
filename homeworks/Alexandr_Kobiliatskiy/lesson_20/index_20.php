<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW-20-1</title>
    <link rel="icon" type="image/png" sizes="192x192" href="icons/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="180x180" href="icons/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-body-secondary p-4">
    <div class="container bg-dark-subtle p-3 rounded-2">
        <form action="register.php" method="post">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Имя</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="namelHelp"
                       name="exampleInputName" pattern="[a-zA-Zа-яА-Я]+" required>
                <div id="namelHelp" class="form-text">Введите свое имя буквами.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputSurname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="exampleInputSurname" aria-describedby="surnamelHelp"
                       name="exampleInputSurname" pattern="[a-zA-Zа-яА-Я]+" required>
                <div id="surnamelHelp" class="form-text">Введите свою фамилию тоже буквами.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="exampleInputEmail" required>
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck">
                <label class="form-check-label" for="exampleCheck">Я согласен попрощаться с конфиденциальностью</label>
            </div>
            <button type="submit" class="btn btn-primary">Отправить </button>
        </form>
    </div>

</div>
<div class="container text-center">
    <?php
    session_start();
    if (isset( $_SESSION['result'])) {
        if ( $_SESSION['result'] == 1) {
            echo "<h4 class='text-success'>Форма успешно заполнена</h4>";

        } elseif (( $_SESSION['result'] == 0)) {
            echo "<h4 class='text-danger'>Форма не заполнена или заполнена неверными данными</h4>";
        }
        unset($_SESSION['result']);
    }

    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

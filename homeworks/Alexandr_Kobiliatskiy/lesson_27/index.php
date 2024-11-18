
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW-27</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluide p-4">
        <div class="container bg-secondary-subtle p-4 rounded-2">
            <form action="logic.php" method="post">
                <div class="mb-3">
                    <label for="userName" class="form-label">Имя</label>
                    <input class="form-control" name="userName" id="userName" aria-describedby="userNameHelp" pattern="[a-zA-Zа-яА-Я]+" required>
                    <div id="userNameHelp" class="form-text">Введите свое имя. Не стесняйтесь. Товарищ капитан должен знать его.</div>
                </div>

                <div class="mb-3">
                    <label for="userAge" class="form-label">Возраст</label>
                    <input type="number" name="userAge" class="form-control" id="userAge" aria-describedby="userAgeHelp" required>
                    <div id="userAgeHelp" class="form-text">Введите свой возраст</div>
                </div>

                <div class="mb-3">
                    <label for="userEmail" class="form-label">Адрес электронной почты</label>
                    <input type="email" name="userEmail" class="form-control" id="userEmail" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Отправить</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
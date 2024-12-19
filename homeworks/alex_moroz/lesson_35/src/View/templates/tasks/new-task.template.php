<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap">
    <link rel="stylesheet" href="../src/View/style/style.css">
    <title>New task</title>
</head>
<body>
<div class="container">
    <div class="tasks--header">
        <div class="tasks">
            <div class="task">
                <form action='/task' method='post'>
                    <div class="task--edit">
                        <input class="task--edit--item" type="text" name='name'
                               required
                               minlength="2"
                               maxlength="150"
                               pattern="^[а-яА-ЯёЁA-Za-z0-9]{2,150}$"
                               title="Введите от 2 до 150 букв.">
                        <input class="task--edit--item"
                               name='description'
                               pattern="^[а-яА-ЯёЁA-Za-z0-9]{2,250}$"
                               title="Введите от 2 до 250 символов.">
                        <input class="task--edit--item" type="date" name='deadline'
                            <?php
                            $today = date_format(
                                new DateTime(),
                                'Y-m-d',
                            ); ?>
                               min="<?= $today ?>"
                        >
                        <button type="submit">Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

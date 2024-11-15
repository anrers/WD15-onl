<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WD-28</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
    <div class='container bg-secondary-subtle p-4'>
        <form action='logic.php' method='post'>
            <div class="mb-3">
                <label for="exampleName" class="form-label">Name</label>
                <input type="text" class="form-control" name='name' id="exampleName">  
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    <?php
    session_start();
    if ( $_SESSION['status'] == 1) {
        echo "<div class='container text-center text-success'>Данные успешно добавлены</div>";
    } else {
        echo "<div class='container text-center text-danger'>Какая-то ошибка</div>";
    }
    ?>
    <div class='container bg-secondary-subtle p-4'>
        <p><a class="link-opacity-100" href="lookAll.php">Посмотреть всех</a></p>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="/View/styles/styleCreateTask.css">
    <title>Document</title>
</head>
<body>
<div>
    <form method="post" action="/create/task">
        <label for="taskName">Название</label>
        <input id="taskName" name="taskName">

        <label for="taskDescription">Описание</label>
        <textarea id="taskDescription" name="taskDescription"></textarea>

        <label for="taskDueDate">Окончание задачи </label>
        <input id="taskDueDate" type="date" name="taskDueDate">

        <button type="submit">Создать задачу</button>
    </form>
</div>
</body>
</html>
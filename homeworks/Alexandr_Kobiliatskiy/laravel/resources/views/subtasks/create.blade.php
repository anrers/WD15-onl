<?php
?>


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create task</title>
</head>
<body>
    <h1>Создаем подзадачи</h1>
    <form action="/subtasks" method="post">
        @csrf
        <div>
            <label id="name">Название</label>
            <input name="name" id="name">
        </div>

        <div>
            <label id="taskId">Id задачи</label>
            <input type="number" name="taskId" id="taskId">
        </div>

        <div>
            <label id="desc">Описание</label>
            <textarea name="description" id="desc"></textarea>
        </div>

        <div>
            <label id="dd">Срок исполнения</label>
            <input name="dueDate" type="datetime-local" id="dd">
        </div>
        <div>
            <button type="submit">Отправить</button>
        </div>

    </form>
</body>
</html>



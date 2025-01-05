<?php
/**
 * @var Subtask $subtask
 */

use App\Models\Subtask\Subtask;
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
<h1>Создаем задачи</h1>
<form action="/subtask/{{$subtask->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name">Название</label>
        <input name="name" id="name" value="{{$subtask->name}}">
    </div>

    <div>
        <label id="taskId">Id задачи</label>
        <input name="taskId" id="taskId" value="{{$subtask->taskId}}">
    </div>

    <div>
        <label id="desc">Описание</label>
        <textarea name="description" id="desc">{{$subtask->description}}</textarea>
    </div>

    <div>
        <label id="dd">Срок исполнения</label>
        <input name="dueDate" type="datetime-local" id="dd" value="{{$subtask->dueDate}}">
    </div>
    <div>
        <button type="submit">Отправить</button>
    </div>

</form>
</body>
</html>

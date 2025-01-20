<?php
/**
 * @var Task $model
 */
use App\Models\Tasks\Task;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        div {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div>Заголовок: {{$model->name}}</div>

    <div>Описание: {{$model->description}}</div>

    <div>Срок: {{$model->dueDate}}</div>

    <div>Статус: {{$model->status ? 'Выполнена' : 'Ожидает выполнения'}}</div>

    <div>Дата выполнения: {{$model->executedAt}}</div>
</body>
</html>

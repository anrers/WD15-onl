<?php
/**
 * @var Subtask $model
 */
use App\Models\Tasks\Subtask;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtask Details</title>
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
    <div>Заголовок: {{ $model->name }}</div>

    <div>Task ID: {{ $model->task_id }}</div>

    <div>Создано: {{ $model->createdAt }}</div>

    <div>Обновлено: {{ $model->updatedAt }}</div>
</body>
</html>

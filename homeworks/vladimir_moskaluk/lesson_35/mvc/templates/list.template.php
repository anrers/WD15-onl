<?php
/**
 * @var array<TaskModel> $tasks
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список задач</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .add-task-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .add-task-btn:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .completed {
            background: #28a745 !important;
            color: white;
        }
        .overdue {
            background: #dc3545 !important;
            color: white;
        }
        .complete-btn {
            background: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .complete-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Список задач</h1>
    <a href="/create" class="add-task-btn">Добавить задачу</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Срок</th>
            <th>Действие</th>
        </tr>
        <?php foreach ($tasks as $task):
            $class = '';
            if ($task->status == 1) {
                $class = 'completed';
            } elseif ($task->dueDate->getTimestamp() < time()) {
                $class = 'overdue';
            }
            ?>
            <tr class="<?= $class ?>">
                <td><?= $task->id ?></td>
                <td><?= $task->name ?></td>
                <td><?= $task->description ?? '' ?></td>
                <td><?= $task->dueDate->format('d.m.Y H:i:s') ?></td>
                <td>
                    <form method="post" action="/update">
                        <input type="hidden" name="id" value="<?= $task->id ?>">
                        <button type="submit" class="complete-btn">Выполнено</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>

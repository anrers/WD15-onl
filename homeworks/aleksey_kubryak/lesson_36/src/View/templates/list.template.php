<?php

use Model\Models\TaskModel;

/**
 * @var array<TaskModel> $tasks
 */

function getTaskBackgroundColor(TaskModel $task): string
{
    if ($task->status == 1) {
        return 'green';
    }
    if ($task->dueDate->getTimestamp() < time()) {
        return 'red';
    }
    return 'white';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task list</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .update-link {
            color: #007bff;
            text-decoration: none;
        }

        .update-link:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <form method="post" action="/update">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th></th>
            </tr>
            <?php foreach ($tasks as $task):
                $background = getTaskBackgroundColor($task);
            ?>
                <tr style="background-color: <?= $background ?>">
                    <td><?= $task->id ?></td>
                    <td><?= $task->name ?></td>
                    <td><?= $task->description ?? '' ?></td>
                    <td><?= $task->dueDate->format('d.m.Y H:i:s') ?></td>
                    <td><input type="submit" value="completed" name="completed"></td>
                    <td>
                        <a href="/update/<?= $task->id ?>" class="update-link">Update</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</body>

</html>
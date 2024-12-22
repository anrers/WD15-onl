<?php
/**
 * @var array<TaskModel> $tasks
 */

use Model\Models\TaskModel;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #6c63ff;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr {
            border-bottom: 1px solid #dddddd;
        }

        tr:nth-of-type(even) {
            background-color: #f9f9f9;
        }

        tr:last-of-type {
            border-bottom: 2px solid #6c63ff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {

            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #574dcf;
        }
    </style>
</head>
<body>
<form  method="post" action="/create">
    <button style = background-color:#6c63ff; >Create new task</button>
</form>
<form method="post" action="/update">

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>DueDate</th>
            <th>Action</th>
        </tr>

        <?php
        foreach ($tasks as $task):

        $background = '#6c63ff';
        if ($task->status == 1) {
            $background = '#008000';
        } else {
            if ($task->dueDate->getTimestamp() < time()) {
                $background = '#FF0000';
            }
        }
        ?>
        </thead>
        <tbody>
        <tr>
            <td><?= $task->id ?></td>
            <td><?= $task->name ?></td>
            <td><?= $task->description ?? '' ?></td>
            <td><?= $task->dueDate->format('d-m-Y-H-i-s') ?></td>
            <td><button style = "background-color: <?= $background ?>;" id = "<?= $task->id ?>">Completed</button></td>
            <?php endforeach; ?>

                                </tr>
                                </tbody>
                                </table>
                                </form>
                                </body>
                                </html>
<?php
/**
 * @var array<TaskModel> $tasks
 */

use Model\Models\TaskModel;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task list</title>
</head>
<body>
<form method="post" action="/update">
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Check completed</th>
        </tr>
        <?php foreach ($tasks as $task):

            $background = 'white';

            if ($task->status == 1) {
                $background = 'green';
            } else if ($task->dueDate->getTimestamp() < time()) {
                $background = 'red';
            }

            ?>
            <tr style="background-color: <?= $background?>">
                <td><?= $task->id?></td>
                <td><?= $task->name?></td>
                <td><?= $task->description ?? ''?></td>
                <td><?= $task->dueDate->format('d.m.Y H:i')?></td>
                <td><input type="submit" value="completed" name="<?=$task->id?>"></td>
            </tr>
        <?php endforeach;?>
    </table>
</form>
<form method="post" action="/create">
    <input type="submit" value="New task" name="pageNewTask">
</form>
</body>
</html>

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
<div><h3>Здесь будет новая задача</h3></div>
<form method="post" action="/create/task">
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Add task</th>
        </tr>
            <tr>
                <td><input name="name" type="text"></td>
                <td><input name="description" type="text"></td>
                <td><input name="date" type="datetime-local"></td>
                <td><input type="submit" value="Add" name="addTask"></td>
            </tr>
    </table>
</form>
</body>
</html>

<?php

use Model\Models\TaskModel;

/**
 * @var TaskModel $task
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
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
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <form method="post" action="/update">
        <h2>Update Task</h2>
        <input type="hidden" name="id" value="<?= $task->id ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($task->name) ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task->description) ?></textarea>

        <label for="dueDate">Due Date:</label>
        <input type="datetime-local" id="dueDate" name="dueDate" value="<?= $task->dueDate->format('Y-m-d\TH:i') ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="0" <?= $task->status == 0 ? 'selected' : '' ?>>Not Completed</option>
            <option value="1" <?= $task->status == 1 ? 'selected' : '' ?>>Completed</option>
        </select>

        <button type="submit">Update Task</button>
    </form>
</body>

</html>
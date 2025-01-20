<?php
/**
 * @var Illuminate\Database\Eloquent\Collection<Subtask> $data
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtasks List</title>
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a {
            color: #28a745;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Subtasks</h1>
    <a href="{{ route('subtasks.create') }}">Create Subtask</a>
    <ul>
        @foreach($data as $subtask)
            <li>
                {{ $subtask->name }} (Task ID: {{ $subtask->task_id }})
            </li>
        @endforeach
    </ul>
</body>
</html>


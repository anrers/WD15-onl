<?php

/**
 * @var Illuminate\Database\Eloquent\Collection<Task> $data
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks List</title>
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
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>
    <ul>
        @foreach($data as $task)
            <li>
                <strong>{{ $task->name }}</strong> (ID: {{ $task->id }})
                <div>
                    <p><strong>Due Date:</strong> {{ $task->dueDate }}</p>
                    <p><strong>Description:</strong> {{ $task->description ?? 'No description' }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>


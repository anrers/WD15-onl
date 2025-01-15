<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Create task</h1>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div>
            <label id="name">Заголовок:</label>
            <input type='text' name="name" id="name">
        </div>

        <div>
            <label id="description">Описание:</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label id="dueDate">Срок:</label>
            <input type="datetime-local" name="dueDate" id="dueDate">
        </div>

        <div>
            <button type="submit">Отправить</button>
        </div>
    </form>
</body>
</html>

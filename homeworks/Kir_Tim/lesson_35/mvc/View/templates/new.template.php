<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .form-container h2 {
            text-align: center;
            color: #6c63ff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {

            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            border-color: #6c63ff;
            outline: none;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #574dcf;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Create New Task</h2>
    <form method="post" action="/create/task">
        <div class="form-group">
            <label for="task-name">Name</label>
            <input type="text" id="task-name" name="name" placeholder="Enter task name" required>
        </div>
        <div class="form-group">
            <label for="task-desc">Description</label>
            <textarea id="task-desc" name="description" placeholder="Enter task description" required></textarea>
        </div>
        <div class="form-group">
            <label for="task-date">Date</label>
            <input type="date" id="task-date" name="date" required>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>

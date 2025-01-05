
<?php
/**
 * @var $data
 */
//dd($data);
?>


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список подзадач</title>
</head>
<body>
    <h1>Список подзадач</h1>
    <ul>
        @foreach($data as $subtask)
            <li>
                {{$subtask->id}}
                {{$subtask->name}}
            </li>
        @endforeach
    </ul>
    <button>
        <a href="/subtasks/create">Создать подзадачу</a>
    </button>
</body>
</html>






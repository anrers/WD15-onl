<?php
/**
 * @var Subtask $data
 */

use App\Models\Subtask\Subtask;
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SubTask</title>
</head>
<body>
<div>
    Заголовок: {{$data->name}}
</div>

<div>
    Заголовок: {{$data->taskId}}
</div>

<div>
    Описание: {{$data->description}}
</div>
<div>
    Срок выполнения: {{$data->dueDate}}
</div>
<div>
    Отметка выполнения: {{$data->status ? 'Выполнено' : 'Не выполнена'}}
</div>

</body>
</html>


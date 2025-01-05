<?php
/**
 * @var Tag $data
 */

use App\Models\Tags\Tag;

?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tag</title>
</head>
<body>
    <div>
        Номер: {{$data->id}}
    </div>
    <div>
        Заголовок: {{$data->name}}
    </div>
</body>
</html>


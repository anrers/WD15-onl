<?php
/**
 * @var Tag $tag
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
    <title>Update tag</title>
</head>
<body>
<h1>Редактируем теги</h1>
<form action="/tag/{{$tag->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name">Название</label>
        <input name="name" id="name" value="{{$tag->name}}">
    </div>

    <div>
        <button type="submit">Отправить</button>
    </div>

</form>
</body>
</html>

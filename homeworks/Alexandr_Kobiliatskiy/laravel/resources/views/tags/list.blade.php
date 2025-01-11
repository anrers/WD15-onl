@php use Illuminate\Support\Collection; @endphp
<?php
/**
 * @var Collection $tags
 */
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tags</title>
</head>
<body>
<ul>
    @foreach($tags as $tag)
        <li>{{$tag->id}}
            {{$tag->name}}
        </li>
    @endforeach
</ul>
<button>
    <a href="/tags/create">Создать тег</a>
</button>
</body>
</html>


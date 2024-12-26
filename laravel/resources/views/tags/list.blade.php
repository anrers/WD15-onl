<?php
/**
 * @var \Illuminate\Support\Collection $tags
 */
?>
<button>
    <a href="/tags/create">Создать тег</a>
</button>
<ul>
    @foreach($tags as $tag)
        <li>{{$tag->id}} {{$tag->name}}</li>
    @endforeach
</ul>

<?php
/**
 * @var Collection $tags
 */

use Illuminate\Support\Collection;
?>

<button>
    <a href="/tags/create">Создать тег</a>
</button>
<ul>
    @foreach($tags as $tag)
        <li>{{$tag->id}} {{$tag->name}}</li>
    @endforeach
</ul>

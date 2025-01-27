<?php
/**
 * @var \Ramsey\Collection\Collection $tags ...
 */

?>

<ul>
    @foreach($tags as $tag)
        <li>{{$tag->id}}{{$tag->name}}</li>
    @endforeach
</ul>

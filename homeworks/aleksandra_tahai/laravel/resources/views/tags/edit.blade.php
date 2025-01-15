<?php
/**
 * @var Tag $tag
 */

use App\Models\Tags\Tag;
?>
<button>
    <a href="/tags">Список тегов</a>
</button>

<form action="/tags/{{$tag->id}}"
      method="post" @style(['display:flex','flex-direction: column','max-width: 300px','row-gap: 10px'])>
    @method('PUT')
    @csrf
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="{{$tag->name}}">

    <input type="submit">
</form>

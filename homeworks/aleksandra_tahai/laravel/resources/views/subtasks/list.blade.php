<?php
/**
 * @var Illuminate\Support\Collection $subtasks
 */
?>
<button>
    <a href="/subtasks/create">Новая подзадача</a>
</button>

<ol>
    @foreach($subtasks as $subtask)
        <li>{{$subtask->name}}</li>
    @endforeach
</ol>


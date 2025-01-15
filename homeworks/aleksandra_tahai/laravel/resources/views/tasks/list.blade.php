<?php
/**
 * @var Illuminate\Support\Collection $tasks
 */
?>
<ol>
    @foreach($tasks as $task)
        <li>{{$task->name}}</li>
            <ol>
                @foreach($task->subtasks as $subtask)
                    <li>{{$subtask->name}}</li>
                @endforeach
            </ol>
    @endforeach
</ol>

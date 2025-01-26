<?php
/**
 * @var Subtask $subtask
 */

use App\Models\Tasks\Subtask;
?>

<form action="/subtasks/{{$subtask->id}}"
      method="post" @style(['display:flex','flex-direction: column','max-width: 300px','row-gap: 10px'])>
    @method('PUT')
    @csrf
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="{{$subtask->name}}">

    <label for="description">Description:</label>
    <textarea id="description" type="text" name="description">{{$subtask->description}}</textarea>

    <label for="taskId">IDtask:</label>
    <input id="taskId" name="taskId" value="{{$subtask->taskId}}">

    <input type="submit">
</form>

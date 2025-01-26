<?php
/**
 * @var Task $task
 */

use App\Models\Tasks\Task;
?>

<form action="/tasks/{{$task->id}}" method="post" @style(['display:flex','flex-direction: column','max-width: 300px','row-gap: 10px'])>
    @method('PUT')
    @csrf
    <label for="name">Name:</label>
    <input id="name" type="text" name="name" value="{{$task->name}}">

    <label for="description">Description:</label>
    <textarea id="description" type="text" name="description" >{{$task->description}}</textarea>

    <label for="dueDate">DueDate:</label>
    <input id="dueDate" type="date" name="dueDate" value="{{$task->dueDate}}">
</form>

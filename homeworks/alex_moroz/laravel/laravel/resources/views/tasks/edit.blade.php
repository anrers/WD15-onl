<?php
/**
 * @var Task $model
 */

use App\Models\Tasks\Task;
?>

<form action="/tasks/{{ $model->id }}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name">Имя:</label>
        <input type="text" name="name" id="name" value="{{ $model->name }}">
    </div>

    <div>
        <label id="description">Описание:</label>
        <textarea name="description" id="description">{{ $model->description }}</textarea>
    </div>

    <div>
        <label id="dueDate">Срок:</label>
        <input type="date" name="dueDate" id="dueDate" value="{{ $model->dueDate->format('Y-m-d') }}">
    </div>
</form>

<?php
/**
 * @var Subtask $model
 */
use App\Models\Tasks\Subtask;
?>

<form action="/subtasks/{{ $model->id }}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name">Имя:</label>
        <input type="text" name="name" id="name" value="{{ $model->name }}">
    </div>

    <button type="submit" value="edit">Обновить</button>
</form>

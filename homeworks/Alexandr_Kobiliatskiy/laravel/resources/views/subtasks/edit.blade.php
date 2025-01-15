<?php
/**
 * @var Subtask $subtask
 */

use App\Models\Subtasks\Subtask;
?>
@extends('components.layout.forCreate')
@section('tittle', 'Редактирование задачи')
@section('create')
<form action="/subtasks/{{$subtask->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name" class="form-label">Название</label>
        <input name="name" id="name" class="form-control" value="{{$subtask->name}}">
    </div>

    <div>
        <label id="taskId" class="form-label">Id задачи</label>
        <input name="taskId" id="taskId" class="form-control" value="{{$subtask->taskId}}">
    </div>

    <div>
        <label id="desc" class="form-label">Описание</label>
        <textarea name="description" id="desc" class="form-control">{{$subtask->description}}</textarea>
    </div>

    <div>
        <label id="dd" class="form-label">Срок исполнения</label>
        <input name="dueDate" type="datetime-local" id="dd" class="form-control" value="{{$subtask->dueDate}}">
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
@endsection

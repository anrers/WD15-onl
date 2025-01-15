<?php
/**
 * @var Task $task
 */
use App\Models\Tasks\Task;
?>

@extends('components.layout.forCreate')
@section('tittle', 'Редактирование задачи')
@section('create')
<form action="/tasks/{{$task->id}}" method="post">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label id="name" class="form-label">Название</label>
        <input class="form-control" name="name" id="name" value="{{$task->name}}">
    </div>

    <div class="mb-3">
        <label id="desc" class="form-label">Описание</label>
        <textarea class="form-control" name="description" id="desc">{{$task->description}}</textarea>
    </div>

    <div class="mb-3">
        <label id="dd" class="form-label">Срок исполнения</label>
        <input class="form-control" name="dueDate" type="datetime-local" id="dd" value="{{$task->dueDate}}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
@endsection


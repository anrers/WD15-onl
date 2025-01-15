<?php
?>

@extends('components.layout.forCreate')

@section('tittle', 'Создание подзадачи')
@section('create')
    <form action="/subtasks" method="post">
        @csrf
        <div>
            <label id="name" class="form-label">Название</label>
            <input name="name" id="name" class="form-control">
        </div>

        <div>
            <label id="taskId" class="form-label">Id задачи</label>
            <input type="number" name="taskId" id="taskId" class="form-control">
        </div>

        <div>
            <label id="desc" class="form-label">Описание</label>
            <textarea name="description" id="desc" class="form-control"></textarea>
        </div>

        <div>
            <label id="dd" class="form-label">Срок исполнения</label>
            <input name="dueDate" type="datetime-local" id="dd" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>

    </form>
@endsection



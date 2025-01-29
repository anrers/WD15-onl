@extends('layouts.base')

@section('title', 'Edit Subtask')

@section('header', 'Edit Subtask')

<?php
/**
 * @var Subtask $model
 */
use App\Models\Tasks\Subtask;
?>
@section('content')
<form action="{{ route('subtasks.update', $model->id) }}" method="post">
    @method('PUT')
    @csrf
    <x-input name="name" label="Заголовок:" type="text" value="{{ $model->name }}"/>
    <x-input name="task_id" label="Task ID:" type="number" value="{{ $model->task_id }}"/>

    <div>
        <button type="submit">Обновить</button>
    </div>
</form>
@endsection

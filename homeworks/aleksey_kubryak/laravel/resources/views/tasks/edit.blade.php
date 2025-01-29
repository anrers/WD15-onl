@extends('layouts.base')

@section('title', 'Edit Task')

@section('header', 'Edit Task')

<?php
/**
 * @var Task $model
 */
use App\Models\Tasks\Task;
?>
@section('content')
<form action="{{ route('tasks.update', $model->id) }}" method="post">
    @method('PUT')
    @csrf
    <x-input name="name" label="Заголовок:" type="text" value="{{ $model->name }}"/>

    <div>
        <label id="description">Описание:</label>
        <textarea name="description" id="description">{{ $model->description }}</textarea>
    </div>

    <x-input name="dueDate" label="Срок:" type="datetime-local" value="{{ \Carbon\Carbon::parse($model->dueDate)->format('Y-m-d\TH:i') }}"/>

    <div>
        <button type="submit">Обновить</button>
    </div>
</form>
@endsection

@extends('layouts.base')

@section('title', 'Subtask Details')

@section('header', 'Subtask Details')

<?php
/**
 * @var Subtask $model
 */
use App\Models\Tasks\Subtask;
?>
@section('content')
    <div>Заголовок: {{ $model->name }}</div>

    <div>Task ID: {{ $model->task_id }}</div>

    <div>Создано: {{ $model->createdAt }}</div>

    <div>Обновлено: {{ $model->updatedAt }}</div>
@endsection

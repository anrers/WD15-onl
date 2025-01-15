@php use App\Models\Tasks\Subtask; @endphp
<?php
/**
 * @var Subtask $subtask
 */
?>

@extends('layout.base')
@section('title','subtasks')
@section('body')
    <button>
        <a href="/subtasks">Список подзадач</a>
    </button>
    <div>Subtask</div>
    <div>Заголовок: {{$subtask->name}}</div>
    <div>Описание: {{$subtask->description}}</div>
    <div>ID task: {{$subtask->taskId}}</div>
@endsection

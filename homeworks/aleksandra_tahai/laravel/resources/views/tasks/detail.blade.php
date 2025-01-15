@php use App\Models\Tasks\Task; @endphp
<?php
/**
 * @var Task $task
 */
?>
@section('title','tasks')
@extends('layout.base')
@section('body')
    <div>Заголовок: {{$task->name}}</div>
    <div>Описание:{{$task->description}}</div>
    <div>Срок:{{$task->dueDate}}</div>
    <div>Статус:{{$task->status ? 'Done':'In process'}}</div>
    <div>Дата выполнения:{{$task->executedAt}}</div>
@endsection




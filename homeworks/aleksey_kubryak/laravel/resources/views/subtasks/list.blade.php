@extends('layouts.base')

@section('title', 'Subtasks List')

@section('header', 'Subtasks List')

<?php
/**
 * @var Illuminate\Database\Eloquent\Collection<Subtask> $data
 */
?>
@section('content')
    <a href="{{ route('subtasks.create') }}">Create Subtask</a>
    <ul>
        @foreach($data as $subtask)
            <li>
                {{ $subtask->name }} (Task ID: {{ $subtask->task_id }})
            </li>
        @endforeach
    </ul>
@endsection

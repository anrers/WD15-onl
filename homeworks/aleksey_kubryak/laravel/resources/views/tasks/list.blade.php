@extends('layouts.base')

@section('title', 'Tasks List')

@section('header', 'Tasks List')

<?php

/**
 * @var Illuminate\Database\Eloquent\Collection<Task> $data
 */

?>
@section('content')
    <a href="{{ route('tasks.create') }}">Create Task</a>
    <ul>
        @foreach($data as $task)
            <li>
                <strong>{{ $task->name }}</strong> (ID: {{ $task->id }})
                <div>
                    <p><strong>Due Date:</strong> {{ $task->dueDate }}</p>
                    <p><strong>Description:</strong> {{ $task->description ?? 'No description' }}</p>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

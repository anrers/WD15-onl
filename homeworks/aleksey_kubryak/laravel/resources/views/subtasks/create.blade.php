@extends('layouts.base')

@section('title', 'Create Subtask')

@section('header', 'Create Subtask')

@section('content')
<form action="{{ route('subtasks.store') }}" method="post">
    @csrf
    <x-input name="name" label="Заголовок:" type="text"/>
    <x-input name="task_id" label="Task ID:" type="number"/>

    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
@endsection

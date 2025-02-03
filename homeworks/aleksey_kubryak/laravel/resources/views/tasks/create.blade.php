@extends('layouts.base')

@section('title', 'Create Task')

@section('header', 'Create Task')

@section('content')
<form action="{{ route('tasks.store') }}" method="post">
    @csrf
    <x-input name="name" label="Заголовок:" type="text"/>

    <div>
        <label id="description">Описание:</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <x-input name="dueDate" label="Срок:" type="datetime-local"/>

    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
@endsection

@section('title','tasks')
@extends('layout.base')
@section('body')
    <form action="/tasks"
          method="post" @style(['display:flex','flex-direction: column','max-width: 300px','row-gap: 10px'])>
        @csrf
        <label for="name">Name:</label>
        <input id="name" type="text" name="name">

        <label for="description">Description:</label>
        <textarea id="description" type="text" name="description"></textarea>

        <label for="dueDate">DueDate:</label>
        <input id="dueDate" type="date" name="dueDate">

        <x-input></x-input>
    </form>
@endsection

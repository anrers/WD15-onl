@extends('layout.base')

@section('title','subtasks')

@section('body')
    <form action="/subtasks"
          method="post" @style(['display:flex','flex-direction: column','max-width: 300px','row-gap: 10px'])>
        @csrf
        <button>
            <a href="/subtasks">Список подзадач</a>
        </button>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name">

        <label for="taskId">taskId:</label>
        <input id="taskId" name="taskId">

        <label for="description">Description:</label>
        <textarea id="description" type="text" name="description"></textarea>
        <x-input></x-input>
    </form>
@endsection



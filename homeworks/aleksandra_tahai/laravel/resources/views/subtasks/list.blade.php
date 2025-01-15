<?php
/**
 * @var Illuminate\Support\Collection $subtasks
 */
?>

@extends('layout.base')
@section('title','subtasks')
@section('body')
    <button>
        <a href="/subtasks/create">Новая подзадача</a>
    </button>
    <ol>
        @foreach($subtasks as $subtask)
            <li>{{$subtask->name}}</li>
        @endforeach
    </ol>
@endsection


<?php
/**
 * @var $data
 */
//dd($data);
?>
@extends('components.layout.forLists')

@section('tittle', 'Список подзадач')
@section('create', 'Создать подзадачу')
@section('path', '/subtasks/create/')
@section('listBody')
    <ul>
        @foreach($data as $subtask)
            <li>
                {{$subtask->id}}
                {{$subtask->name}}
            </li>
        @endforeach
    </ul>
@endsection






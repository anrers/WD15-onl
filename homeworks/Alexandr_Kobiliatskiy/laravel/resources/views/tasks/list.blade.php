
<?php
/**
 * @var $data
 */
//dd($data);
?>

@extends('components.layout.forLists')

@section('tittle', 'Список задач')
@section('create', 'Создать задачу')
@section('path', '/tasks/create/')
@section('listBody')
            <div class="row text-bold">
                <div class="col-1 text-center"><h5>№п/п</h5></div>
                <div class="col-2"><h5>Название</h5></div>
                <div class="col-5"><h5>Описание</h5></div>
                <div class="col-2"><h5>Выполнить до</h5></div>
                <div class="col-1"><h5>Статус</h5></div>
                <div class="col-1"><h5></h5></div>
            </div>
            @foreach($data as $task)
                <div class="row">
                    <div class="col-1 text-center">{{$task->id}}</div>
                    <div class="col-2">{{$task->name}}</div>
                    <div class="col-5">{{$task->description}}</div>
                    <div class="col-2">{{$task->dueDate}}</div>
                    <div class="col-1 text-center">{{$task->status}}</div>
                    <form class="col-1" action="/tasks/{{$task->id}}/completed" method="get">
                        <div class="text-center"><button type="submit" class="btn">Готово</button></div>
                    </form>

                </div>
            @endforeach
@endsection






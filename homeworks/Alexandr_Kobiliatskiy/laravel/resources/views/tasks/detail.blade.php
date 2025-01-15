<?php
/**
 * @var Task $data
 */

use App\Models\Tasks\Task;

?>
@extends('components.layout.forCreate')
@section('tittle', 'Задача')
@section('create')
    <div>
        Заголовок: {{$data->name}}
    </div>
    <div>
        Описание: {{$data->description}}
    </div>
    <div>
        Срок выполнения: {{$data->dueDate}}
    </div>
    <div>
        Отметка выполнения: {{$data->status ? 'Выполнено' : 'Не выполнена'}}
    </div>
@endsection


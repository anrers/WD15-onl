<?php
/**
 * @var Subtask $data
 */

use App\Models\Subtasks\Subtask;
?>

@extends('components.layout.forCreate')
@section('tittle', 'Подзадача')
@section('create')
<div>
    Заголовок: {{$data->name}}
</div>

<div>
    Номер задачи: {{$data->taskId}}
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


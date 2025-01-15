@php use App\Models\Tasks\Task; @endphp
<?php
/**
 * @var Task $task
 */
?>

<div>Заголовок: {{$task->name}}</div>
<div>Описание:{{$task->description}}</div>
<div>Срок:{{$task->dueDate}}</div>
<div>Статус:{{$task->status ? 'Done':'In process'}}</div>
<div>Дата выполнения:{{$task->executedAt}}</div>





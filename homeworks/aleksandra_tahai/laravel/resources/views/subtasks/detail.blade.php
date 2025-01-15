@php use App\Models\Tasks\Subtask; @endphp
<?php
/**
 * @var Subtask $subtask
 */
?>
<button>
    <a href="/subtasks">Список подзадач</a>
</button>

<div>Subtask</div>
<div>Заголовок: {{$subtask->name}}</div>
<div>Описание: {{$subtask->description}}</div>
<div>ID task: {{$subtask->taskId}}</div>

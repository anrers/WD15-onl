<?php
/**
 * @var Task $model
 */

use App\Models\Tasks\Task;

?>


<div>Заголовок: {{$model->name}}</div>
<div>Описание: {{$model->description}}</div>
<div>Срок: {{$model->dueDate}}</div>
<div>Статус: {{ $model->status ? 'Выполнена' : 'Ожидает выполнения' }}</div>
<div>Дата выполнения: {{ $model->executedAt }}</div>

<?php

use App\Models\Tasks\Task;

/**
 * @var Task $model
 */
?>

<div > Заголовок {{$model->name}} </div >
<div > Описание {{$model->description}} </div >
<div > Срок: {{$model->dueDate}}</div >
<div > Статус {{$model->status ? 'Выполнено' : 'Ожидает выполнения' }}</div >
<div > Дата выполнения {{$model->executedAt}}</div >

@php use App\Models\Tasks\Task; @endphp
<?php
/**
 * @var Task $model
 */

?>

<form action="/tasks/{{$model->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name">Имя</label>
        <input type="text" name="name" id="name" value="{{$model->name}}">
    </div>
    <div>
        <label id="description">Описание</label>
        <textarea type="description" id="description" {{$model->description}}></textarea>
    </div>
    <div>
        <label id="date">Срок</label>
        <input type="date" name="dueDate" id="date" {{$model->dueDate}}>
    </div>
</form>

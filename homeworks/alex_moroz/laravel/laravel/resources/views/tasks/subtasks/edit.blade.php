@php
/**
 * @var Subtask $model
 */

use App\Models\Tasks\Subtask;

@endphp

@section('title', 'Edit subtask')

<x-layout.component>
    <x-slot:h1>
        <h1>Редактировать подзадачу</h1>
    </x-slot:h1>

    <form action="/subtasks/{{ $model->id }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label id="name">Имя:</label>
            <x-inputs.text text="{{ $model->name }}" name="name" id="name"/>
        </div>
        <input type="hidden" name="taskId" value="{{ $model->task->id }}">

        <button type="submit" value="edit">Обновить</button>
    </form>
</x-layout.component>

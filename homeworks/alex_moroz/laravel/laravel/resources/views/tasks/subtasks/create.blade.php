@php
    /**
 * @var Subtask $model
 */

/**
 * @var Collection $tasks
 */

use App\Models\Tasks\Subtask;
use Illuminate\Support\Collection;
@endphp

@section('title', 'Create subtask')

<x-layout.component>
    <x-slot:h1>
        <h1>Создать подзадачу</h1>
    </x-slot:h1>
    <form action="/subtasks" method="post">
        @csrf
        <div>
            <label id="name">Имя:</label>
            <x-inputs.text :name="'name'" id="name"/>
        </div>

        <div>
            <label id="taskId">Задача:</label>
            <select name="taskId">
                @foreach($tasks as $task)
                    <option value={{$task->id}}>{{$task->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" value="create">Cоздать</button>
    </form>
</x-layout.component>

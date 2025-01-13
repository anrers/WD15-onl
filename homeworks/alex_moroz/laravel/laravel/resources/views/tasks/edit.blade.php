@php /**
 * @var Task $model
 */

use App\Models\Tasks\Task;

@endphp

@section('title', 'Edit task')

<x-layout.component>
    <x-slot:h1>
        <h1>Редактировать задачу</h1>
    </x-slot:h1>

    <form action="/tasks/{{ $model->id }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label id="name">Имя:</label>
            <x-inputs.text :text="$model->name" name="name" id="name"/>
        </div>

        <div>
            <label id="description">Описание:</label>
            <x-inputs.description :description="$model->description"/>
        </div>

        <div>
            <label id="dueDate">Срок:</label>
            <x-inputs.date :date="$model->dueDate"/>
        </div>

        <button type="submit" value="edit">Обновить</button>
    </form>
</x-layout.component>

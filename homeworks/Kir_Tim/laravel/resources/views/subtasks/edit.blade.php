@php
    /**
     * @var Subtask $model
     */
    use App\Models\Tasks\Subtask;
@endphp
@section('title', 'Изменить subtask')
<x-layout.main>
    <x-slot:h1>
        <h1>Изменить subtask</h1>
    </x-slot:h1>
    <form action="/subtasks/{{ $model->id }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label id="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ $model->name }}">
        </div>
        <button type="submit" value="edit">Обновить</button>
    </form>
</x-layout.main>

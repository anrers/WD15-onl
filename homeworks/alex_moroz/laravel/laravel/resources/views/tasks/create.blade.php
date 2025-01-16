@section('title', 'New task')

<x-layout.component>
    <x-slot:h1>
        <h1>Создать задачу</h1>
    </x-slot:h1>

    <form action="/tasks" method="post">
        @csrf
        <div>
            <label id="name">Имя:</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label id="description">Описание:</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label id="dueDate">Срок:</label>
            <x-inputs.date/>
        </div>
        <button type="submit" value="create">Cоздать</button>
    </form>
</x-layout.component>

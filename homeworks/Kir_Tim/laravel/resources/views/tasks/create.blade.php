@section('title', 'New task')
<x-layout.main>
    <x-slot:h1>
        <h1>Создать задачу</h1>
    </x-slot:h1>
    <form action="/tasks" method="post">
        @csrf
        <div>
            <label id="name">Имя</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label id="description">Описание</label>
            <textarea type="description" id="description"></textarea>
        </div>
        <div>
            <label id="date">Срок</label>
            <input type="date" name="dueDate" id="date">
        </div>
    </form>
</x-layout.main>

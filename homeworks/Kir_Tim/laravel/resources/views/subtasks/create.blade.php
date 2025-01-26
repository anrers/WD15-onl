@section('title', 'New subtask')
<x-layout.main>
    <x-slot:h1>
        <h1>Создать subtask</h1>
    </x-slot:h1>
    <form action="/subtasks/create" method="post">
        @csrf
        <label for='name'>Имя</label>
        <input type="text" name="name" id="name">

        <button type="submit" value="create">Create</button>
    </form>
</x-layout.main>>

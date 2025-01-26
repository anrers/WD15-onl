@section('title', 'Создать tag')
<x-layout.main>
    <x-slot:h1>
        <h1>Создать тэг</h1>
    </x-slot:h1>
    <form action="/tags/create" method="post">
        @csrf
        <label for="name">Имя тега</label>
        <x-inputs.text :name="'name'" id="name"/>
        <button type="submit" value="create">Cоздать</button>
    </form>
</x-layout.main>

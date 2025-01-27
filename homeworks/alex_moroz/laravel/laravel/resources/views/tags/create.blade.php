@section('title', 'New tag')

<x-layout.component>
    <x-slot:h1>
        <h1>Создать тэг</h1>
    </x-slot:h1>

    <form action="/tags" method="post">
        @csrf
        <label for="name">Имя тега</label>
        <x-inputs.text :name="'name'" id="name"/>

        <button type="submit" value="create">Cоздать</button>
    </form>
</x-layout.component>>

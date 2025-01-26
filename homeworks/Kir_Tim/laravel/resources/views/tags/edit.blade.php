@php
    /**
     * @var Tag $model
     */
    use App\Models\Tags\Tag;
@endphp
@section('title', 'Edit tag')
<x-layout.main>
    <x-slot:h1>
        <h1>Редактировать тэг</h1>
    </x-slot:h1>
    <form action="/tags/{{ $model->id }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label id="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ $model->name }}">
        </div>
        <button type="submit" value="edit">Обновить</button>
    </form>
</x-layout.main>

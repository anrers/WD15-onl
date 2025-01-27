@php
    /**
     * @var Tag $model
     */

    use App\Models\Tags\Tag;
@endphp

@section('title', 'About tag')

<x-layout.component>
    <x-slot:h1>
        <h1>Детально о таге:</h1>
    </x-slot:h1>

    <div>Заголовок: {{$model->name}}</div>
</x-layout.component>

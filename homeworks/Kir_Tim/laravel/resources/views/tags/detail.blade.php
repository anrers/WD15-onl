@php

use App\Models\Tags\Tag;

/**
 * @var Tag $model
 */
@endphp
@section('title', 'About tag')

<x-layout.main>
    <x-slot:h1>
        <h1>Детально о tag:</h1>
    </x-slot:h1>

    <div>Заголовок: {{$model->name}}</div>
</x-layout.main>

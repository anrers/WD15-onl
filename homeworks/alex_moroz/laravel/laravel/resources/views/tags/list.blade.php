@php
    /**
     * @var Collection $tags
     */

    use Illuminate\Support\Collection;

@endphp

@section('title', 'Tag list')

<x-layout.component>
    <x-slot:h1>
        <h1>Список тэгов</h1>
    </x-slot:h1>

    <button>
        <a href="/tags/create">Создать тег</a>
    </button>
    <ul>
        @foreach($tags as $tag)
            <li>{{$tag->id}} {{$tag->name}}</li>
        @endforeach
    </ul>
</x-layout.component>

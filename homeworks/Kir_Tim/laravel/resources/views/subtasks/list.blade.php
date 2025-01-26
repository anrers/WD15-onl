@section('title', 'Subtasks')

<x-layout.main>
    <x-slot:h1>
        <h1>Список subtasks</h1>
    </x-slot:h1>
    <ul>
        @foreach($data as $subtask)
            <li>{{$subtask->id}}</li>
        @endforeach
    </ul>
</x-layout.main>

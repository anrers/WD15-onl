@section('title', 'Subtasks')

<x-layout.component>
    <x-slot:h1>
        <h1>Список подзадач</h1>
    </x-slot:h1>

    <ul>
        @foreach($data as $subtask)
            <li>{{$subtask->id}}</li>
        @endforeach
    </ul>
</x-layout.component>

@section('title', 'Tasks')

<x-layout.component>
    <x-slot:h1>
        <h1>Список задач</h1>
    </x-slot:h1>

    <ul>
        @foreach($data as $task)
            <li>{{$task->id}}</li>
        @endforeach
    </ul>
</x-layout.component>

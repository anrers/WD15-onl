
<?php
/**
 * @var $data
 */
//dd($data);
?>
@section('title', 'Задачи')

<x-layout.component>
    <h1>Список задач</h1>
    <ul>
        @foreach($data as $task)
            <li>
                {{$task->id}}
                {{$task->name}}
            </li>
        @endforeach
    </ul>
    <button>
        <a href="/tasks/create">Создать задачу</a>
    </button>
</x-layout.component>






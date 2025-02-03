@php
    /**
     * @var Task $model
     */

    use App\Models\Tasks\Task;
@endphp

@section('title', 'About task')

<x-layout.component>
    <x-slot:h1>
        <h1>Детально о задаче:</h1>
    </x-slot:h1>

    <div>Заголовок: {{$model->name}}</div>
    <div>Описание: {{$model->description}}</div>
    <div>Срок: {{$model->dueDate}}</div>
    <div>Статус: {{ $model->status ? 'Выполнена' : 'Ожидает выполнения' }}</div>
    <div>Дата выполнения: {{ $model->executedAt }}</div>
    <div>
        @foreach($images as $image)
            <img src="{{ $image }}" alt="{{$model->id}}" style="max-height: 150px; max-width: 150px">
        @endforeach
    </div>

</x-layout.component>

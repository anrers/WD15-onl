@php
    use App\Models\Tasks\Task;
    /**
     * @var Task $model
     */
@endphp
@section('title', 'About task')
<x-layout.main>
    <x-slot:h1>
        <h1>Детально о задаче:</h1>
    </x-slot:h1>
    <div> Заголовок {{$model->name}} </div>
    <div> Описание {{$model->description}} </div>
    <div> Срок: {{$model->dueDate}}</div>
    <div> Статус {{$model->status ? 'Выполнено' : 'Ожидает выполнения' }}</div>
    <div> Дата выполнения {{$model->executedAt}}</div>
</x-layout.main>

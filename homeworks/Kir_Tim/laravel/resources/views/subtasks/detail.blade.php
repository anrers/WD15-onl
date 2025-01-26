@php
    use App\Models\Tasks\Subtask;
    /**
     * @var Subtask $model
     */
@endphp
@section('title', 'About subtask')

<x-layout.main>
    <x-slot:h1>
        <h1>Детально о subtask:</h1>
    </x-slot:h1>
    <div>Заголовок: {{$model->name}}</div>
</x-layout.main>

@php
    /**
     * @var Subtask $model
     */

    use App\Models\Tasks\Subtask;
@endphp

@section('title', 'About subtask')

<x-layout.component>
    <x-slot:h1>
        <h1>Детально о подзадаче:</h1>
    </x-slot:h1>

    <div>Заголовок: {{$model->name}}</div>
</x-layout.component>

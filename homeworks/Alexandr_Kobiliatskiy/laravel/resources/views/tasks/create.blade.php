@extends('components.layout.forCreate')

@section('tittle', 'Создание задачи')
@section('create')
    <form action="/tasks" method="post">
        @csrf
        <div class="mb-3">
            <label id="name" class="form-label">Название</label>
            <input name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label id="desc" class="form-label">Описание</label>
            <textarea name="description" id="desc" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label id="dd" class="form-label">Срок исполнения</label>
            <input name="dueDate" type="datetime-local" id="dd" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
@endsection




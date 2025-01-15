<?php
?>
<?php
?>
@extends('components.layout.forCreate')

@section('tittle', 'Создание тега')
@section('create')

<form action="/tags" method="post">
    @csrf
    <div class="mb-2">
        <label id="name" class="form-label">Название</label>
        <input name="name" id="name" class="form-control">
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
@endsection



<?php
/**
 * @var Tag $tag
 */

use App\Models\Tags\Tag;

?>
@extends('components.layout.forCreate')
@section('tittle', 'Редактирование задачи')
@section('create')
<form action="/tags/{{$tag->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label id="name" class="form-label">Название</label>
        <input name="name" id="name" class="form-control" value="{{$tag->name}}">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
@endsection

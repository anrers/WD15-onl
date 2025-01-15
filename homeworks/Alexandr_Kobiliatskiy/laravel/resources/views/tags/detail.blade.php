<?php
/**
 * @var Tag $data
 */

use App\Models\Tags\Tag;

?>
@extends('components.layout.forCreate')
@section('tittle', 'Тег')
@section('create')
    <div>
        Номер: {{$data->id}}
    </div>
    <div>
        Заголовок: {{$data->name}}
    </div>
@endsection


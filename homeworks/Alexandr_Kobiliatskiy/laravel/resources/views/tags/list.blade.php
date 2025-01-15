@php use Illuminate\Support\Collection; @endphp
<?php
/**
 * @var Collection $tags
 */
?>
@extends('components.layout.forLists')

@section('tittle', 'Список тегов')
@section('create', 'Создать тег')
@section('path', '/tags/create/')
@section('listBody')

<ul>
    @foreach($tags as $tag)
        <li>{{$tag->id}}
            {{$tag->name}}
        </li>
    @endforeach
</ul>
@endsection


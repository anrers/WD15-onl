@php use App\Models\Tags\Tag @endphp
<?php
/**
 * @var Tag $tag
 */
?>
@extends('layout.base')
@section('title','tags')
@section('body')
    <div>Tag</div>
    <div>Заголовок: {{$tag->name}}</div>
@endsection

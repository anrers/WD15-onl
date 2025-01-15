<?php
/**
 * @var Illuminate\Support\Collection $tags
 */
?>
@extends('layout.base')
@section('title','tags')
@section('body')
    <button>
        <a href="/tags/create">Create tag</a>
    </button>
    <ol>
        @foreach($tags as $tag)
            <li>{{$tag->name}}</li>
            <ol>
                <div>Task:</div>
                @foreach($tag->tasks as $task)
                    <li>{{$task->name}}</li>
                @endforeach
            </ol>
        @endforeach
    </ol>
@endsection

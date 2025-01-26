<?php

use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tags\TagResourseController;
use App\Http\Controllers\Tasks\SubtaskResourseController;
use App\Http\Controllers\Tasks\TaskResourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome');});

Route::get('/tasks/{id}/tag/{tagId}', [TaskController::class, 'attachTag']);

Route::resource('/tasks', TaskResourseController::class);
Route::resource('/tags', TagResourseController::class);
Route::resource('/subtasks', SubtaskResourseController::class);

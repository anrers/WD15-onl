<?php

use App\Http\Controllers\Subtasks\SubtaskController;
use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'users']);

Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/task/{id}', [TaskController::class, 'show']);
Route::get('/task/{id}/edit', [TaskController::class, 'edit']);
Route::put('/task/{id}', [TaskController::class, 'update']);
Route::delete('/task/{id}', [TaskController::class, 'destroy']);

Route::get('/subtasks/create', [SubtaskController::class, 'create']);
Route::post('/subtasks', [SubtaskController::class, 'store']);
Route::get('/subtasks', [SubtaskController::class, 'index']);
Route::get('/subtask/{id}', [SubtaskController::class, 'show']);
Route::get('/subtask/{id}/edit', [SubtaskController::class, 'edit']);
Route::put('/subtask/{id}', [SubtaskController::class, 'update']);
Route::delete('/subtask/{id}', [SubtaskController::class, 'destroy']);

Route::get('/tags/create', [TagController::class, 'create']);
Route::post('/tags', [TagController::class, 'store']);
Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);
Route::get('/tags/{id}/edit', [TagController::class, 'edit']);
Route::put('/tag/{id}', [TagController::class, 'update']);
Route::delete('/tags/{id}', [TagController::class, 'destroy']);


Route::get('/tasks/{id}/tag/{tagId}', [TaskController::class, 'attachTag']);


<?php

use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tasks\SubtaskController;
use App\Http\Controllers\Tasks\TaskResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tags/create', [TagController::class, 'create']);
Route::post('/tags', [TagController::class, 'store']);

Route::get('/tags', [TagController::class, 'index']);
Route::get('/tags/{id}', [TagController::class, 'show']);

Route::get('/tags/{id}/edit', [TagController::class, 'edit']);
Route::put('/tags/{id}', [TagController::class, 'update']);

Route::delete('/tags/{id}', [TagController::class, 'destroy']);

Route::resource('/tasks', TaskResourceController::class);
Route::get('/tasks/{id}/subtasks', [TaskResourceController::class, 'getSubtasks']);
Route::get('/tasks/{id}/tags/{tagId}', [TaskResourceController::class, 'attachTag']);

Route::get('/subtasks/create', [SubtaskController::class, 'create']);
Route::post('/subtasks', [SubtaskController::class, 'store']);

Route::get('/subtasks', [SubtaskController::class, 'index']);
Route::get('/subtasks/{id}', [SubtaskController::class, 'show']);

Route::get('/subtasks/{id}/edit', [SubtaskController::class, 'edit']);
Route::put('/subtasks/{id}', [SubtaskController::class, 'update']);

Route::delete('/subtasks/{id}', [SubtaskController::class, 'destroy']);

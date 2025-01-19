<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\SubtaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home']);
Route::get('/my', [MyController::class, 'my']);
Route::get('/tasks', [TaskController::class, 'getAll']);
Route::get('/test', [TaskController::class, 'test']);


Route::get('/Tags/create', [TagController::class, 'createView']);
Route::post('/Tags/create', [TagController::class, 'create']);
Route::get('/Tags', [TagController::class, 'list']);
Route::put('/Tags/{id}', [TagController::class, 'update']);
Route::get('/Tags/{id}/edit', [TagController::class, 'edit']);
Route::delete('/Tags/{id}', [TagController::class, 'destroy']);


Route::post('/tasks/{id}/tag/{tagId}', [TaskController::class, 'attachTag']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/{id}', [TaskController::class, 'getById']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

<?php

use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\TaskResourceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home']);


Route::get('/Tags/create', [TagController::class, 'createView']);
Route::post('/Tags/create', [TagController::class, 'create']);
Route::get('/Tags', [TagController::class, 'list']);
Route::get('/tasks/{id}/Tags/{tagId}', [TaskController::class, 'attachTag']);

Route::resource('/tasks', TaskResourceController::class);

//Route::get('/tasks/create', [TaskController::class, 'create']);
//Route::post('/tasks', [TaskController::class, 'store']);
//
//Route::get('/tasks', [TaskController::class, 'index']);
//Route::get('/tasks/{id}', [TaskController::class, 'show']);
//
//Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
//Route::put('/tasks/{id}', [TaskController::class, 'update']);
//
//Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);


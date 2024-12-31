<?php

use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home']);
Route::get('/tasks', [TaskController::class, 'getAll']);

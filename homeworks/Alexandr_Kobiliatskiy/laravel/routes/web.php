<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$var = UserController::class;
Route::get('/home', [UserController::class, 'home']);

$var2 = MainController::class;
Route::get('/mai', [MainController::class, 'mai']);

$var3 = TaskController::class;
Route::get('/tasks', [TaskController::class, 'getAll']);


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


Route::prefix('/tags')
    ->controller(TagController::class)
    ->name('tags.')
    ->group(function () {
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/create', 'createView')->name('create');
        Route::get('/', 'list')->name('list');
        Route::post('/create', 'create')->name('create');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::prefix('/tasks')
    ->controller(TaskController::class)
    ->name('tasks.')
    ->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'getById')->name('detail');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/tag/{tagId}', 'attachTag')->name('attachTag');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::prefix('/subtasks')
    ->controller(SubtaskController::class)
    ->name('subtasks.')
    ->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'getById')->name('detail');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

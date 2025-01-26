<?php

use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tags\TagResourseController;
use App\Http\Controllers\Tasks\SubtaskResourseController;
use App\Http\Controllers\Tasks\TaskResourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/tasks', TaskResourseController::class);
Route::prefix('tasks')
    ->controller(TaskResourseController::class)
    ->name('tasks.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store');
        Route::get('/{id}', 'show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'edit')->where('id', '[0-9]+')->name('edit');
        Route::put('/{id}', 'update')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', 'destroy')->where('id', '[0-9]+')->name('destroy');
    });


//Route::resource('/tags', TagResourseController::class);
Route::prefix('tags')
    ->controller(TagResourseController::class)
    ->name('tags.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store');
        Route::get('/{id}', 'show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'edit')->where('id', '[0-9]+')->name('edit');
        Route::put('/{id}', 'update')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', 'destroy')->where('id', '[0-9]+')->name('destroy');
    });

//Route::resource('/subtasks', SubtaskResourseController::class);
Route::prefix('subtasks')
    ->controller(SubtaskResourseController::class)
    ->name('subtasks.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store');
        Route::get('/{id}', 'show')->where('id', '[0-9]+')->name('show');
        Route::get('/{id}/edit', 'edit')->where('id', '[0-9]+')->name('edit');
        Route::put('/{id}', 'update')->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', 'destroy')->where('id', '[0-9]+')->name('destroy');
    });


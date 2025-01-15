<?php

use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\SubtaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function(){
    Route::prefix('tasks')->group(function() {
        Route::get('/', 'index')->name('tasks.index');
        Route::get('/create', 'create')->name('tasks.create');
        Route::post('/', 'store')->name('tasks.store');

        Route::prefix('/{id}')->group(function() {
            Route::get('/', 'show')->name('tasks.show')->where('id', '[0-9]+');
            Route::get('/edit', 'edit')->name('tasks.edit');
            Route::put('/', 'update')->name('tasks.update');
            Route::delete('/', 'destroy')->name('tasks.destroy');
        });
    });
});

Route::controller(SubtaskController::class)->group(function(){
    Route::prefix('subtasks')->group(function() {
        Route::get('/', 'index')->name('subtasks.index');
        Route::get('/create', 'create')->name('subtasks.create');
        Route::post('/', 'store')->name('subtasks.store');

        Route::prefix('/{id}')->group(function() {
            Route::get('/', 'show')->name('subtasks.show')->where('id', '[0-9]+');
            Route::get('/edit', 'edit')->name('subtasks.edit');
            Route::put('/', 'update')->name('subtasks.update');
            Route::delete('/', 'destroy')->name('subtasks.destroy');
        });
    });
});

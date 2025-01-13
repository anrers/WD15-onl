<?php

use App\Http\Controllers\Tags\TagController;
use App\Http\Controllers\Tasks\SubtaskController;
use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$commonRoutes = function (): void {
    Route::get('create', 'create')->name('create');
    Route::post('', 'store')->name('store');

    Route::get('', 'index')->name('index');
    Route::get('{id}', 'show')->name('show');

    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}', 'update')->name('update');

    Route::delete('{id}', 'destroy')->name('destroy');
};

Route::prefix('tags')
    ->name('tags.')
    ->controller(TagController::class)
    ->group($commonRoutes);


//Route::resource('/tasks', TaskResourceController::class);

Route::prefix('tasks')
    ->name('tasks.')
    ->controller(TaskController::class)
    ->group(function () {
        Route::get('{id}/subtasks', 'getSubtasks')->name('getSubtasks');
        Route::get('{id}/tags/{tagId}', 'attachTag')->name('attachTag');
    })
    ->group($commonRoutes);

Route::prefix('subtasks')
    ->name('subtasks.')
    ->controller(SubtaskController::class)
    ->group($commonRoutes);

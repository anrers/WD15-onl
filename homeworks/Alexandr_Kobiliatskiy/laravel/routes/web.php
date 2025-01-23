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

Route::prefix('tasks')
    ->name('tasks.')
    ->group(function () {
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/{id}/completed', [TaskController::class, 'completed'])->name('completed');
    Route::get('/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('destroy');

});

Route::prefix('subtasks')
    ->name('subtasks.')
    ->group(function () {
        Route::get('/create', [SubtaskController::class, 'create'])->name('create');
        Route::post('/', [SubtaskController::class, 'store'])->name('store');
        Route::get('/', [SubtaskController::class, 'index'])->name('index');
        Route::get('/{id}', [SubtaskController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SubtaskController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SubtaskController::class, 'update'])->name('update');
        Route::delete('/{id}', [SubtaskController::class, 'destroy'])->name('destroy');
    });

Route::prefix('tags')
    ->name('tags.')
    ->group(function () {
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/{id}', [TagController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });


Route::get('/test', [TaskController::class, 'test']);

//Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
//Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
//Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
//Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
//Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
//Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
//Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
//
//Route::get('/subtasks/create', [SubtaskController::class, 'create'])->name('subtasks.create');
//Route::post('/subtasks', [SubtaskController::class, 'store'])->name('subtasks.store');
//Route::get('/subtasks', [SubtaskController::class, 'index'])->name('subtasks.index');
//Route::get('/subtasks/{id}', [SubtaskController::class, 'show'])->name('subtasks.show');
//Route::get('/subtasks/{id}/edit', [SubtaskController::class, 'edit'])->name('subtasks.edit');
//Route::put('/subtasks/{id}', [SubtaskController::class, 'update'])->name('subtasks.update');
//Route::delete('/subtasks/{id}', [SubtaskController::class, 'destroy'])->name('subtasks.destroy');
//
//Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
//Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
//Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
//Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');
//Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
//Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
//Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');


Route::get('/tasks/{id}/tags/{tagId}', [TaskController::class, 'attachTag']);

Route::get('joblist', function () {
    $jobs = DB::table("jobs")->get();
    dd($jobs);
});

Route::get('job', function () {
    \App\Jobs\VideoConvertJob::dispatch(['data'=>'data']);
});


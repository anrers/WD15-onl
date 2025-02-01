<?php

use App\Http\Controllers\ApiTaskController;

Route::prefix('tasks')
    ->name('tasks.')
    ->group(function () {
        Route::post('/', [ApiTaskController::class, 'store'])->name('store');
        Route::get('/', [ApiTaskController::class, 'index'])->name('index');
        Route::get('/{id}/completed', [ApiTaskController::class, 'completed'])->name('completed');
        Route::get('/{id}', [ApiTaskController::class, 'show'])->name('show');
        Route::put('/{id}', [ApiTaskController::class, 'update'])->name('update');
        Route::delete('/{id}', [ApiTaskController::class, 'destroy'])->name('destroy');

    });

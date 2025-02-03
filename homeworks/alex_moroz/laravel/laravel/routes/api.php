<?php

use App\Http\Controllers\Tasks\ApiTaskController;

$commonRoutes = function (): void {
    Route::post('', 'store')->name('store');

    Route::get('', 'index')->name('index');
    Route::get('{id}', 'show')->name('show');

    Route::put('{id}', 'update')->name('update');

    Route::delete('{id}', 'destroy')->name('destroy');
};

Route::prefix('tasks')
    ->name('tasks.')
    ->controller(ApiTaskController::class)
    ->group(function () {
        Route::get('{id}/subtasks', 'getSubtasks')->name('getSubtasks');
        Route::get('{id}/tags/{tagId}', 'attachTag')->name('attachTag');
        Route::get('{id}/complete', 'complete')->name('complete');
    })
    ->group($commonRoutes);

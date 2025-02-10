<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\TaskSaving;
use App\Listeners\GenerateTaskSlug;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $listen = [
        TaskSaving::class => [
            GenerateTaskSlug::class,
        ],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

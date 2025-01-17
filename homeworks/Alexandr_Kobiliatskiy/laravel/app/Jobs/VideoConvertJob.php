<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class VideoConvertJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public array $data
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(10);
    }
}

<?php

namespace Database\Seeders\Tasks;

use App\Models\Tasks\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(5) -> create();
    }
}

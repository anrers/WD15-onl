<?php

namespace Database\Seeders\Tasks;

use App\Models\Tasks\Subtask;
use Illuminate\Database\Seeder;

class SubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtask::factory()->count(5)->create();
    }
}

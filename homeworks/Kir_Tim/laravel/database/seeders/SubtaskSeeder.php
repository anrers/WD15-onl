<?php

namespace Database\Seeders;

use App\Models\Tasks\Subtask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subtask::factory()->count(10)->create();
    }
}

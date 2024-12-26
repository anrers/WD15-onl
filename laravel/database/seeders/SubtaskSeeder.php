<?php

namespace Database\Seeders;

use App\Models\Tasks\Subtask;
use Illuminate\Database\Seeder;

class SubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subtask = new Subtask();
        $subtask->name = 'subtask 2';
        $subtask->task_id = 1;
        $subtask->save();
    }
}

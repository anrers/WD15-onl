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
        $subtask = new Subtask();
        $subtask->taskId = 1;
        $subtask->name = 'Subtask 1';
        $subtask->save();
    }
}

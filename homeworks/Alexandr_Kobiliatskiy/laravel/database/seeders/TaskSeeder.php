<?php

namespace Database\Seeders;

use App\Models\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
//    {
//        $newTasks = new Task();
//        $newTasks->name = 'My Task';
//        $newTasks->description = 'My Task';
//        $newTasks->dueDate = Carbon::now();
//        $newTasks->save();
//    }
    {
        Task::factory()->count(10)->create();
    }
}

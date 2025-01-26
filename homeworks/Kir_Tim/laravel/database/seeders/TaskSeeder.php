<?php

namespace Database\Seeders;

use App\Models\Tasks\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        Task::factory()->count(5)->create();
//        $newTask = new Task();
//        $newTask->name = 'My first task';
//        $newTask->description = 'My first task description';
//        $newTask->dueDate = Carbon::now();
//        $newTask->save();
    }
}

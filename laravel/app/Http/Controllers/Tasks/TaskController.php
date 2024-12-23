<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
    public function getAll()
    {
        $data = Task::all();

        return view('tasks.list', compact('data'));
    }
}

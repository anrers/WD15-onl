<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Tasks\Task;

class TaskController extends Controller
{
    public function getAll()
    {
//        $data = Task::where('name', 'like', '%e%')
//            ->where('id', '<', 4)
//            ->orWhere('id', '=', 6)
//            ->get();
        $data = Task::all();
        //dd($data);
        return view('tasks.list', compact('data'));
    }
}

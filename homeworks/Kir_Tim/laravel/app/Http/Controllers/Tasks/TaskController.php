<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Tags\Tag;
use App\Models\Tasks\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    public function getAll()
    {
        $data = Task::all();

        return view('tasks.list', compact('data'));
    }

    public function attachTag(int $id, int $tagId)
    {
        $task = Task::find($id);


        $task->tags()->syncWithoutDetaching([$tagId]);
//        $tags = $task->tags()->get();
//        $tags = Tag::find(1);


        return view('welcome');
    }

    public function getById(int $id)
    {
        $data = Task::find($id);

        return view('tasks.detail', ['model' => $data]);
    }

    public function create()
    {
      return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->dueDate = Carbon::createFromTimestamp($request->input('dueDate'));
        $task->save();

        return redirect('/tasks/' . $task->id);
    }
    public function edit(int $id)
    {
       $task = Task::find($id);

       return view('tasks.edit', ['model' => $task]);
    }

    public function update(CreateTaskRequest $request, $id)
    {
        /**
         * @var Task $task
         */
        $task = Task::find($id);

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->dueDate = Carbon::createFromTimestamp($request->input('dueDate'));
        $task->save();

        return redirect('/tasks/' . $task->id);
    }


    public function destroy(int $id)
    {
        /**
         * @var Task $task
         */

        $task = Task::find($id);
        $task->delete();
    }


}

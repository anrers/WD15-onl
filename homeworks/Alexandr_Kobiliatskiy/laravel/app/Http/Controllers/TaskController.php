<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;


class TaskController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $data = $this->taskService->getAll();
        return view('tasks.list', compact('data'));
    }

    public function show(int $id)
    {
        $data = $this->taskService->getById($id);
        return view('tasks.detail', compact('data'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);
        //return redirect('/tasks/' . $task->id);
        return redirect()->route('tasks.show', ['id' => $task->id]);

    }

    public function edit(int $id)
    {
        $task = $this->taskService->getById($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);
        //return redirect('/tasks/' . $task->id);
        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function destroy(int $id)
    {
        $this->taskService->delete($id);
        return redirect()->route('tasks.index');
    }


    public function attachTag(int $id, int $tagId): \Illuminate\Http\RedirectResponse
    {
        $task = Task::find($id);
        $task->tags()->attach($tagId);
        return redirect()->back();
    }

}

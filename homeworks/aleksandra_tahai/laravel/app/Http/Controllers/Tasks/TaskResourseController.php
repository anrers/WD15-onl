<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Http\Request;

class TaskResourseController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function attachTag(int $id, int $tagId)
    {
        $task = $this->taskService->getById($id);
        $tag = $task->tags()->syncWithoutDetaching([$tagId]);
        return view('tasks.list');
    }

    public function index()
    {
        $tasks = $this->taskService->getAll();

        return view('tasks.list', compact('tasks'));
    }

    public function show(int $id)
    {
        $task = $this->taskService->getById($id);
        return view('tasks.detail', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);
        return redirect()->route('tasks.index'.$task->id);
    }

    public function edit(int $id)
    {
        $task = $this->taskService->getById($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(CreateTaskRequest $request, int $id)
    {
        $task = $this->taskService->update($id, $request->validated());
        return redirect()->route('tasks.index'.$task->id);
    }

    public function destroy(int $id)
    {
        $task = $this->taskService->delete($id);
        return redirect()->route('tasks.index');
    }
}

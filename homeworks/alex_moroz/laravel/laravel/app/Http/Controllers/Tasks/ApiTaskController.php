<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Http\RedirectResponse;

class ApiTaskController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return $this->taskService->getAll();
    }

    public function show(int $id)
    {
        return $this->taskService->getById($id);
    }

    public function store(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);

        return response($task, 201);
    }

    public function update(CreateTaskRequest $request, int $id)
    {
        $data = $request->validated();
        $this->taskService->update($id, $data);

        return response(status: 200);
    }

    public function destroy(int $id)
    {
        $this->taskService->delete($id);
        return response(status: 200);
    }

    public function attachTag(int $id, int $tagId): RedirectResponse
    {
        /**
         * @var Task $task
         */
        $task = $this->taskService->getById($id);
        $task->tags()->attach($tagId);
        return redirect()->route('tasks.index');
    }

    public function getSubtasks(int $id)
    {
        /**
         * @var Task $task
         */
        $task = $this->taskService->getById($id);
        $subtasks = $task->subtasks()->get();
        return view('tasks.subtasks', compact('subtasks'));
    }

    public function complete(int $id)
    {
        $this->taskService->complete($id);

        return response(status: 200);
    }
}

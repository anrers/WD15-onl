<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function list()
    {
        $data = $this->taskService->getAll();

        return view('tasks.list', compact('data'));
    }

    public function attachTag(int $id, int $tagId)
    {
        /**
         * @var Task $task
         */
        $task = $this->taskService->getById($id);
        $task->tags()->attach($tagId);
        return redirect()->route('tasks.list');
    }

    public function getById(int $id)
    {
        $data = $this->taskService->getById($id);
        return view('tasks.detail', ['model' => $data]);;
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);
        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function edit(int $id)
    {
        $task = $this->taskService->getById($id);
        return view('tasks.edit', ['model' => $task]);
    }

    public function update(CreateTaskRequest $request, $id)
    {
        $data = $request->validated();
        $task = $this->taskService->update($id, $data);
        return redirect()->route('tasks.show', ['id' => $task->id]);
    }


    public function destroy(int $id)
    {
        $this->taskService->delete($id);
    }
}

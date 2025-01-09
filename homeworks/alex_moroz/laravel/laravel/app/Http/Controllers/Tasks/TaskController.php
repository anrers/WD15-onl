<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Http\RedirectResponse;

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

        return view('tasks.detail', ['model' => $data]);
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

    public function update(CreateTaskRequest $request, int $id)
    {
        $data = $request->validated();
        $task = $this->taskService->update($id, $data);

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function destroy(int $id)
    {
        $this->taskService->delete($id);
        return redirect()->route('tasks.index');
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
}

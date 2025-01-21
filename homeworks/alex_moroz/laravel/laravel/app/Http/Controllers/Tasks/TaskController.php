<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Jobs\NotificationJob;
use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    protected TaskServiceInterface $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(): View
    {
        $data = $this->taskService->getAll();

        return view('tasks.list', compact('data'));
    }

    public function show(int $id): View
    {
        $data = $this->taskService->getById($id);

        return view('tasks.detail', ['model' => $data]);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $task = $this->taskService->create($data);

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function edit(int $id): View
    {
        $task = $this->taskService->getById($id);

        return view('tasks.edit', ['model' => $task]);
    }

    public function update(CreateTaskRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();
        $task = $this->taskService->update($id, $data);

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function destroy(int $id): RedirectResponse
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

    public function getSubtasks(int $id): View
    {
        /**
         * @var Task $task
         */
        $task = $this->taskService->getById($id);
        $subtasks = $task->subtasks()->get();
        return view('tasks.subtasks', compact('subtasks'));
    }

    public function complete(int $id): RedirectResponse
    {
        $this->taskService->complete($id);
        $task = $this->taskService->getById($id);

        NotificationJob::dispatch("Task $task->name was completed at $task->executedAt")
        ->onQueue('notifications');

        return redirect()->route('tasks.index');
    }
}

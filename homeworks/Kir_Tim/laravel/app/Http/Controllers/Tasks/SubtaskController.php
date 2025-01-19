<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateSubtaskRequest;
use App\Services\Tasks\SubtaskService;
use App\Services\Tasks\TaskService;

class SubtaskController extends Controller
{
    protected SubtaskServiceInterface $subtaskService;
    protected TaskServiceInterface $taskService;

    public function __construct(SubtaskService $subtaskService, TaskService $taskService)
    {
        $this->subtaskService = $subtaskService;
        $this->taskService = $taskService;
    }

    public function list()
    {
        $data = $this->subtaskService->getAll();

        return view('subtasks.list', compact('data'));
    }

    public function show(int $id)
    {
        $data = $this->subtaskService->getById($id);

        return view('subtasks.detail', ['model' => $data]);
    }

    public function create()
    {
        $tasks = $this->subtaskService->getAll();

        return view('subtasks.create', compact('tasks'));
    }

    public function store(CreateSubtaskRequest $request)
    {
        $data = $request->validated();
        $subtask = $this->subtaskService->create($data);

        return redirect()->route('subtasks.detail', ['id' => $subtask->id]);
    }

    public function edit(int $id)
    {
        $subtask = $this->subtaskService->getById($id);

        return view('subtasks.edit', ['model' => $subtask]);
    }

    public function update(CreateSubtaskRequest $request, int $id)
    {
        $data = $request->validated();
        $subtask = $this->subtaskService->update($id, $data);

        return redirect()->route('subtasks.detail', ['id' => $subtask->id]);
    }

    public function destroy(int $id)
    {
        $this->subtaskService->delete($id);
        return redirect()->route('subtasks.list');
    }
}

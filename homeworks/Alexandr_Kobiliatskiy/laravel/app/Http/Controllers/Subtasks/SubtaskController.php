<?php

namespace App\Http\Controllers\Subtasks;


use App\Contracts\Services\Subtasks\SubTaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subtasks\CreateSubTaskRequest;
use App\Services\Subtasks\SubTaskService;


class SubtaskController extends Controller
{
    protected SubTaskServiceInterface $subTaskService;

    public function __construct(SubTaskService $subTaskService)
    {
        $this->subTaskService = $subTaskService;
    }

    public function index()
    {
        $data = $this->subTaskService->getAll();
        return view('subtasks.list', compact('data'));
    }

    public function show(int $id)
    {
        $data = $this->subTaskService->getById($id);
        return view('subtasks.detail', compact('data'));
    }

    public function create()
    {
        return view('subtasks.create');
    }

    public function store(CreateSubTaskRequest $request)
    {
        $data = $request->validated();
        $subtask = $this->subTaskService->create($data);
        return redirect('/subtask/' . $subtask->id);

    }

    public function edit(int $id)
    {
        $subtask = $this->subTaskService->getById($id);
        return view('subtasks.edit', compact('subtask'));
    }

    public function update(CreateSubTaskRequest $request)
    {
        $data = $request->validated();
        $subtask = $this->subTaskService->create($data);
        return redirect('/subtask/' . $subtask->id);
    }

    public function destroy(int $id)
    {
        $this->subTaskService->delete($id);
        return redirect('/subtasks');
    }


}

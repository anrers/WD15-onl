<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateSubtaskRequest;
use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Services\Tasks\SubtasksService;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    protected SubtaskServiceInterface $subtaskService;

    public function __construct(SubtasksService $subtaskService)
    {
        $this->subtaskService = $subtaskService;
    }

    public function index()
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
        return view('subtasks.create');
    }

    public function store(CreateSubtaskRequest $request)
    {
        $data = $request->validated();
        $subtask = $this->subtaskService->create($data);

        return redirect('/subtasks/' . $subtask->id);
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

        return redirect('/subtasks/' . $subtask->id);
    }

    public function destroy(int $id)
    {
        $this->subtaskService->delete($id);

        return redirect('/subtasks');
    }
}

<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\CreateSubtaskRequest;
use App\Services\Tasks\SubtaskService;
use Illuminate\Http\Request;

class SubtaskResourseController extends Controller
{
    protected SubtaskServiceInterface $subtaskService;

    public function __construct(SubtaskService $subtaskService)
    {
        $this->subtaskService = $subtaskService;
    }

    public function index()
    {
        $subtasks = $this->subtaskService->getAll();
        return view('subtasks.list', ['subtasks' => $subtasks]);
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

    public function show(string $id)
    {
        $subtask = $this->subtaskService->getById($id);
        return view('subtasks.detail', ['subtask' => $subtask]);
    }

    public function edit(string $id)
    {
        $subtask = $this->subtaskService->getById($id);
        return view('subtasks.edit', ['subtask' => $subtask]);
    }

    public function update(CreateSubtaskRequest $request, string $id)
    {
        $subtask = $this->subtaskService->update($id, $request->validated());
        return redirect('/subtasks/' . $subtask->id);
    }

    public function destroy(string $id)
    {
        return $this->subtaskService->delete($id);
    }
}

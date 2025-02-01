<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Jobs\NotificationJob;
use App\Services\Tasks\TaskService;

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
        $this->taskService->create($data);
        return response(status: 201);

    }


    public function update(CreateTaskRequest $request)
    {
        $data = $request->validated();
        $this->taskService->update($request->id, $data);
        return response(status: 200);
    }

    public function destroy(int $id)
    {
        $this->taskService->delete($id);
        return response(status: 200);
    }


    public function completed(int $id)
    {
        $this->taskService->changeStatus($id);
        return response(status: 200);

    }
}

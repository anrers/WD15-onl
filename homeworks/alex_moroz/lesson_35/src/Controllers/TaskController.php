<?php

namespace Morozav\Lesson35\Controllers;

use Morozav\Lesson35\Model\Services\Tasks\Impl\TaskServiceImpl;
use Morozav\Lesson35\Model\Services\Tasks\TaskService;
use Morozav\Lesson35\View\TaskView;
use Morozav\Lesson35\Model\Repositories\Tasks\Impl\TaskRepositoryImpl;

class TaskController
{

    public function getAll(): string
    {
        $tasks = $this->getTaskService()->getAll();
        return (new TaskView())->render('list', $tasks);
    }

    public function createNewTaskView(): string
    {
        return (new TaskView())->render('new-task', null);
    }

    public function getById(int $id): string
    {
        $task = $this->getTaskService()->getById($id);
        return (new TaskView())->render('edit-task', $task);
    }

    public function create(): string
    {
        $this->getTaskService()->create($_POST);
        header('location: /tasks');
        return $this->getAll();
    }

    public function update(): string
    {
        $this->getTaskService()->update($_POST);
        header('location: /tasks');
        return $this->getAll();
    }

    public function resolve(int $id): string
    {
        $this->getTaskService()->resolve($id);
        header('location: /tasks');
        return $this->getAll();
    }

    /**
     * @return mixed
     */
    public function getTaskService(): TaskService
    {
        $repository = new TaskRepositoryImpl();
        return new TaskServiceImpl($repository);
    }
}
<?php

namespace App\Services\Tasks;

use App\Contracts\Services\AbstractEntityService;
use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Events\Tasks\CompleteTaskEvent;
use App\Jobs\FillEmptySlugJob;
use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\NoReturn;

class TaskService extends AbstractEntityService implements TaskServiceInterface
{
    public function getAll(): \Illuminate\Support\Collection
    {
        FillEmptySlugJob::dispatch()->onQueue('update_empty_slug');
        return parent::getAll();
    }

    function getModelClass(): string
    {
        return Task::class;
    }

    public function getById(int $id): ?Task
    {
        return $this->builder()->find($id);
    }

    public function create(array $data): ?Task
    {
        $task = $this->fill(new Task(), $data);

        $task->save();

        return $task;
    }

    public function update(int $id, array $data): ?Task
    {
        /**
         * @var Task $task
         */
        $task = $this->builder()->find($id);

        $task = $this->fill($task, $data);

        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Task $task
         */
        $task = $this->builder()->find($id);
        return $task->delete();
    }

    public function complete(int $id): void
    {
        /**
         * @var Task $task
         */
        $task = $this->builder()->find($id);
        $task->status = true;
        $task->executedAt = now();

        $task->save();

        CompleteTaskEvent::dispatch($task);
    }

    public function increasePoints(Task $task): void
    {
        if ($task->status == 1) {
            //increase points logic
            sleep(2);
        }
    }

    #[NoReturn]
    public function updateTasksWithEmptySlug(): void
    {
        /**
         * @var Collection<Task> $tasks
         */
        $tasks = $this->builder()->whereNull('slug')->get();
        dump(count($tasks));
        foreach ($tasks as $task) {
            $task->generateSlug();
            $task->update();
        }
    }

    public function attachImages(Task $task, array $images): void
    {
        $imagesData = $task->images ?? [];

        foreach ($images as $image) {
            $imagesData[] = Storage::disk('public')->putFile(
                path: "/tasks/$task->id",
                file: $image,
            );
        }

        $task->images = $imagesData;
        $task->save();
    }

    public function deleteImages(Task $task): void
    {
        if (!empty($task->images)) {
            foreach ($task->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $task->images = [];
        $task->save();
    }

    private function fill(Task $task, array $data): ?Task
    {
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->dueDate = $data['dueDate'];

        return $task;
    }
}

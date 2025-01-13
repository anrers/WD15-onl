<?php

namespace App\Contracts\Services\Tasks;

use App\Contracts\Services\EntityServiceInterface;
use Illuminate\Support\Collection;

interface SubtaskServiceInterface extends EntityServiceInterface {
    public function getAllByTaskId(int $taskId): Collection;
}

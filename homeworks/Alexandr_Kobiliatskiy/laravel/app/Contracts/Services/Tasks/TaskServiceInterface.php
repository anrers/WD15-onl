<?php

namespace App\Contracts\Services\Tasks;

use App\Contracts\Services\EntityServiceInterface;

interface TaskServiceInterface extends EntityServiceInterface
{
    public function changeStatus(int $id);
}

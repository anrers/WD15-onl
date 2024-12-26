<?php

namespace app\Contracts\Services;

use App\Models\BaseModel;
use Illuminate\Support\Collection;

interface EntityServiceInterface
{
    public function getById(int $id): ?BaseModel;

    public function getAll(): Collection;

    public function create(array $data): ?BaseModel;

    public function update(int $id, array $data): ?BaseModel;

    public function delete(int $id): bool;
}

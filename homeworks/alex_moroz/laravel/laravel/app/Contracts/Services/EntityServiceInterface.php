<?php

namespace App\Contracts\Services;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface EntityServiceInterface
{
    public function getById(int $id): ?BaseModel;

    public function getAll(): Collection;

    public function create(array $data): ?BaseModel;

    public function update(int $id, array $data): ?BaseModel;

    public function delete(int $id): bool;
}

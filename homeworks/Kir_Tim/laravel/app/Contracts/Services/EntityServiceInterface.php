<?php

namespace App\Contracts\Services;

use App\Models\BaseModel;
use Ramsey\Collection\Collection;
use Illuminate\Database\Eloquent\Builder;

interface EntityServiceInterface
{
    public function getById(int $id): ?BaseModel;
    public function getAll(): Collection;

    public function create(array $data): ?BaseModel;

    public function update(array $data,int $id): ?BaseModel;

    public function delete(int $id): bool;

}

<?php

namespace App\Contracts\Services;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class AbstractEntityService
{
    abstract function getModelClass(): string;

    public function getAll(): Collection
    {
        return $this->builder()->get();
    }

    public function builder(): Builder
    {
        return ($this->getModelClass())::query();
    }
}

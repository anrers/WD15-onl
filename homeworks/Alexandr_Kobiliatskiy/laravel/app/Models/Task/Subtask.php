<?php

namespace App\Models\Task;

use App\Models\BaseModel;
use Database\Factories\Task\SubtaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends BaseModel
{
    /** @use HasFactory<SubtaskFactory> */
    use HasFactory;
}

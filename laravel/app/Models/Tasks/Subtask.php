<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subtask extends BaseModel
{
    /** @use HasFactory<\Database\Factories\Tasks\SubtaskFactory> */
    use HasFactory;
}

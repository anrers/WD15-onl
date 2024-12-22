<?php

namespace App\Models\Task;

use Database\Factories\Task\SubtaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    /** @use HasFactory<SubtaskFactory> */
    use HasFactory;
}

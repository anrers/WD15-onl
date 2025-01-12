<?php

namespace App\Models\tags;

use App\Models\BaseModel;
use Database\Factories\Tags\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;
}

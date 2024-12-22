<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    const string CREATED_AT = 'createdAt';
    const string UPDATED_AT = 'updatedAt';
}

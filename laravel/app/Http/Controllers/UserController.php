<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function home()
    {
        $data = User::query()->where('id', '=',1);

        return $data;
    }
}

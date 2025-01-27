<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $data = User::query()->where('id', '=', 1)->get();

        return $data;
    }
}

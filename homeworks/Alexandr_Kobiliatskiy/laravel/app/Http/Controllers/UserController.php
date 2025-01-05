<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $data = User::all();
//        dd($data);
        return view('users', compact('data'));
    }
}

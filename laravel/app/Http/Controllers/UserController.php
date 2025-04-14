<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('name', 'admin')->get();
        sleep(2);
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        $user->undefinedMethod();
        return response()->json($user);
    }
}

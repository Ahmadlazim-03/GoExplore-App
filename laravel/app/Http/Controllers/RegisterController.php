<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register (Request $request){
        
        $credentials = $request->validate([
            "name" => ['required'],
            "email" => ['required','email:dns'],
            "password" => ['required','min:5'],
        ]);
        $create = User::create($credentials);

        if($create){
            return response()->json(['redirect' => '/login']);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
